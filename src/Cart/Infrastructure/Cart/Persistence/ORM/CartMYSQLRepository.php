<?php

declare(strict_types=1);

namespace Src\Cart\Infrastructure\Cart\Persistence\ORM;

use Src\Cart\Domain\Cart\Cart;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartUuidVO;
use Src\Cart\Infrastructure\Cart\Adapter\CartAdapter;


final class CartMYSQLRepository implements CartRepository
{

    public function __construct(private CartORMModel $model)
    {
    }

    /**
     * @throws \Exception
     */
    public function show(CartUuidVO $id): ?Cart
    {
        $query = $this->model->find($id->value());
        return (new CartAdapter($query))->cartModelAdapter();
    }

    /**
     * @throws \Exception
     */
    public function showAll(): array
    {
        $eloquent_carts = $this->model->all();
        $carts               = [];

        foreach ($eloquent_carts as $eloquent_cart) {
            $carts[] = (new CartAdapter($eloquent_cart))->cartModelAdapter();
        }
        return $carts;

    }

    public function save(Cart $cart): void
    {
        $this->model->create($cart->getPrimitives());
    }

    public function update(Cart $cart): void
    {
        $update_cart = $this->model->find($cart->getUuid()->value());
        $update_cart->update($cart->getPrimitives());

    }

    public function delete(CartUuidVO $id): void
    {
        $cart = $this->model->find($id->value());
        $cart->delete();
    }
}
