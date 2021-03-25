<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('katasandi'),
            'email' => 'admin@gmail.com'
        ]);
    }
}
