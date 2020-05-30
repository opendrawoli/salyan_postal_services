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
        DB::table('users')->insert([
            'name' => 'Opendra Oli',
            'email' => 'opendraoli66@gmail.com',
            'password' => bcrypt('opendraoli66'),
            'status'	=>'0'
        ]);
    }
}
