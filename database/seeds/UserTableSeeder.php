<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class UserTableSeeder extends Seeder
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
            'name' => 'Khurram',
            'email' => 'khurram.asml'.'@gmail.com',
            'password' => bcrypt('khurram'),
        ]);		
    }
}
