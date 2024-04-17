<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Message_fhSeeder extends Seeder
{
    public function run()
    {
        DB::table('message_fh')->insert([
            ['id' => '1', 'name' => 'Ренат Шапка', 'phone' => '89090139191', 'created_at' => '2024-03-20T14:48:20', 'updated_at' => '2024-03-20T14:48:20'],
            ['id' => '2', 'name' => 'Елена', 'phone' => '+79217336493', 'created_at' => '2024-03-27T13:11:10', 'updated_at' => '2024-03-27T13:11:10'],
            ['id' => '3', 'name' => 'Елизавета', 'phone' => '+7 921 837-86-10', 'created_at' => '2024-03-28T16:25:42', 'updated_at' => '2024-03-28T16:25:42'],
            ['id' => '4', 'name' => 'Александр', 'phone' => '7 (921) 545-69-24', 'created_at' => '2024-03-29T06:42:48', 'updated_at' => '2024-03-29T06:42:48'],
            ['id' => '5', 'name' => 'Сергей', 'phone' => '89210536045', 'created_at' => '2024-03-29T12:39:42', 'updated_at' => '2024-03-29T12:39:42'],
            ['id' => '6', 'name' => 'Анастасия', 'phone' => '89535194992', 'created_at' => '2024-04-02T19:14:29', 'updated_at' => '2024-04-02T19:14:29'],
            ['id' => '7', 'name' => 'Виктория', 'phone' => '+7(921)537-09-31', 'created_at' => '2024-04-02T19:43:12', 'updated_at' => '2024-04-02T19:43:12'],
            ['id' => '8', 'name' => 'Елена', 'phone' => '+7 (921) 237-09-91', 'created_at' => '2024-04-03T15:59:44', 'updated_at' => '2024-04-03T15:59:44'],
        ]);
    }
}
