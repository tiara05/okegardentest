<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'          => 'Tiara Rahmania',
                'email'         => 'tiara@user.com',
                'password'      => bcrypt('12345'),
                'role'          => 'user',
            ],
            [
                'name'          => 'Harya Bima',
                'email'         => 'harya@gardener.com',
                'password'      => bcrypt('12345'),
                'role'          => 'gardener',
            ],
            [
                'name'          => 'Masita Rahma',
                'email'         => 'masita@designer.com',
                'password'      => bcrypt('12345'),
                'role'          => 'designer',
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
