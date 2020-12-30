<?php

namespace Database\Seeders;

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
        //
         //

        //  'name',
        //  'email',
        //  'password',
        //  'isAdmin'
         DB::table('users')->insert(
            [
                
                "name"=>"admin",
                "email"=>"admin@app.com",
                "password"=>Hash::make('password'),
                "isAdmin"=> "1"
            ]);
    }
}
