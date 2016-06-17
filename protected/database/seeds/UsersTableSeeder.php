<?php

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
        //
        DB::table('users')->insert([
            'first_name' => "Administrator",
            'last_name' => 'Administrator',
            'user_name' => 'admin',
            'email' => 'chriss.innocent@gmail.com',
            'password' => bcrypt('admin'),
            'status' => 'Active',
        ]);
    }
}
