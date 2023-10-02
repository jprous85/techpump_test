<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'uuid'       => Uuid::uuid4(),
                'name'       => 'admin',
                'email'      => 'admin@admin.com',
                'password'   => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s')
            ],
            [
                'uuid'       => Uuid::uuid4(),
                'name'       => 'user 1',
                'email'      => 'admin-1@admin.com',
                'password'   => bcrypt('password'),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s')
            ]
        ];
        foreach ($users as $user) {
            $userDb = DB::table('users')->where('email', $user['email'])->first();

            if (!$userDb) {
                DB::table('users')->insert($user);
            }
        }
    }
}
