<?php

declare(strict_types=1);


namespace Src\Cart\Infrastructure\CartItem\Persistence;


use Illuminate\Database\Eloquent\Model;

final class CartItemORMModel extends Model
{
    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    protected $table = "cart_items";

    protected $guarded = [];

}
