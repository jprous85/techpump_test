<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'uuid'        => Uuid::uuid4(),
                'reference'   => '',
                'name'        => '',
                'description' => '',
                'price'       => 12.95,
                'amount'      => 1,
                'available'   => Carbon::createFromFormat('Y-m-d h:i:s', Carbon::now()->addYear()->toTimeString()),
                'active'      => 1,
                'created_at'  => Carbon::now()->format('Y-m-d h:i:s')
            ],
            [
                'uuid'        => Uuid::uuid4(),
                'reference'   => '',
                'name'        => '',
                'description' => '',
                'price'       => 45.99,
                'amount'      => 1,
                'available'   => Carbon::createFromFormat('Y-m-d h:i:s', Carbon::now()->addYear()->toTimeString()),
                'active'      => 1,
                'created_at'  => Carbon::now()->format('Y-m-d h:i:s')
            ]
        ];
        foreach ($products as $product) {
            $productDb = DB::table('products')->where('reference', $product['reference'])->first();

            if (!$productDb) {
                DB::table('products')->insert($product);
            }
        }
    }
}
