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
        DB::table('users')->insert([
            'name' => 'admindb',
            'email' => 'admin@admin',
            'password' => Hash::make('password'),
            'role'=>'admin'
        ]);
    }
}
