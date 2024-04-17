<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    public function run()
    {
        DB::table('price')->insert([
        ]);
    }
}
