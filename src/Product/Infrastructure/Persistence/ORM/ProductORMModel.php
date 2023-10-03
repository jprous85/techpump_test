<?php

declare(strict_types = 1);

namespace Src\Product\Infrastructure\Persistence\ORM;

use Illuminate\Database\Eloquent\Model;

/**
 * @method find($value)
 * @method create(array $data_mapper): void
 */
final class ProductORMModel extends Model
{
    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    protected $table = "products";

    protected $guarded = [];

}
