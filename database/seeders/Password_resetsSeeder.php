<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Password_resetsSeeder extends Seeder
{
    public function run()
    {
        DB::table('password_resets')->insert([
        ]);
    }
}
