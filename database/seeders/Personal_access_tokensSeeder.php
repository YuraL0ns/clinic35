<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Personal_access_tokensSeeder extends Seeder
{
    public function run()
    {
        DB::table('personal_access_tokens')->insert([
        ]);
    }
}
