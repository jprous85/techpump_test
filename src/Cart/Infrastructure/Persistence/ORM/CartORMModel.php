<?php

declare(strict_types = 1);

namespace Src\Cart\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Model;

/**
 * @method find($value)
 * @method create(array $data_mapper): int
 */
final class CartORMModel extends Model
{
    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    protected $table = "carts";

    protected $guarded = [];

}
