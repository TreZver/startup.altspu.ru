<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'email'             => 'Grishkov_ya@altspu.ru',
            'email_verified_at' => date('Y-m-d H:i:s')    ,
            'password'          => Hash::make('2QQtO3')   ,
            'created_at'        => date('Y-m-d H:i:s')    ,
            'updated_at'        => date('Y-m-d H:i:s')    
        ]);
        $user->assignRole('admin');
    }
}
