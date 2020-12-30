<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                "id"=>1,
                "type"=>"book",
                "title"=>"PHP Objects, Patterns and Practice",
                "firstname"=>"Matt",
                "mainname"=>"Zandstra",
                "price"=>44.99,
                "numpages"=>408
            ],
            [
                "id"=>3,
                "type"=>"cd",
                "title"=>"Seeking Thrills",
                "firstname"=>"",
                "mainname"=>"Georgia",
                "price"=>8.5,
                "playlength"=>45
            ],
            [
                "id"=>4,
                "type"=>"cd",
                "title"=>"Architecto totam dol",
                "firstname"=>"Odette",
                "mainname"=>"Alexander",
                "price"=>762,
                "playlength"=>99
            ],
            [
                "id"=>6,
                "type"=>"book",
                "title"=>"Fugit rerum officii",
                "firstname"=>"Timon",
                "mainname"=>"Gaines",
                "price"=>228,
                "numpages"=>11
            ],
            [
                "id"=>7,
                "type"=>"book",
                "title"=>"Sudep",
                "firstname"=>"sudeep",
                "mainname"=>"Solis",
                "price"=>757,
                "numpages"=>66
            ]]);
    }
}
