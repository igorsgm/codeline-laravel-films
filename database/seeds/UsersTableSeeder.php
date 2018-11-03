<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'Igor Moraes',
            'email'             => 'igor.sgm@gmail.com',
            'password'          => bcrypt('123456'),
            'email_verified_at' => now()
        ]);
    }
}
