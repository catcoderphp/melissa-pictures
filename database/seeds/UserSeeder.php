<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')
            ->insert([
                'name' => 'root',
                'email' => 'catcoder.php@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('20772792h'),
            ]);
        \DB::table('users')
            ->insert([
                'name' => 'admin',
                'email' => 'catcoder.py@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('20772792h'),
            ]);
    }
}
