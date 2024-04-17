<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Password_reset_tokensSeeder extends Seeder
{
    public function run()
    {
        DB::table('password_reset_tokens')->insert([
        ]);
    }
}
