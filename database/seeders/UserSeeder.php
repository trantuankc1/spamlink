<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 80; $i++)
        {
            DB::table('user_traffics')->insert([
                'spam_link' => Str::random(10),
                'target_link' => Str::random(10),
            ]);
        }
    }
}
