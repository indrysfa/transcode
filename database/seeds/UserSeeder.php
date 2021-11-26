<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'          => 'Indry Sefviana',
                'email'         => 'indrysfa@gmail.com',
                'username'      => 'indry',
                'password'      => Hash::make('qwerty'),
                'role'          => 'admin',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        User::insert($users);
    }
}
