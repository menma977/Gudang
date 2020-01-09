<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'rule'     => 0,
            'name'     => 'holder',
            'username' => 'holder',
            'phone'    => 'holder',
            'password' => bcrypt('holder'),
        ]);

        DB::table('users')->insert([
            'rule'     => 1,
            'name'     => 'admin',
            'username' => 'admin',
            'phone'    => 'admin',
            'password' => bcrypt('admin'),
        ]);

        DB::table('users')->insert([
            'rule'     => 2,
            'name'     => 'headShed',
            'username' => 'headShed',
            'phone'    => 'headShed',
            'password' => bcrypt('headShed'),
        ]);

        DB::table('users')->insert([
            'rule'     => 3,
            'name'     => 'shed',
            'username' => 'shed',
            'phone'    => 'shed',
            'password' => bcrypt('shed'),
        ]);

        DB::table('users')->insert([
            'rule'     => 4,
            'name'     => 'sales',
            'username' => 'sales',
            'phone'    => 'sales',
            'password' => bcrypt('sales'),
        ]);
    }
}
