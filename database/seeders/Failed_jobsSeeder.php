<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Failed_jobsSeeder extends Seeder
{
    public function run()
    {
        DB::table('failed_jobs')->insert([
        ]);
    }
}
