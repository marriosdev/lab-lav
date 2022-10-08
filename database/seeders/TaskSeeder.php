<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' => Str::random(10),
            'description' => Str::random(40),
            'created_at' => date("Y-m-d H:m:s"),
            'user_id' => 1,
            'status_id'=>1
        ]);

        DB::table('tasks')->insert([
            'title' => Str::random(10),
            'description' => Str::random(40),
            'created_at' => date("Y-m-d H:m:s"),
            'user_id' => 2,
            'status_id'=>1
        ]);

        DB::table('tasks')->insert([
            'title' => Str::random(10),
            'description' => Str::random(40),
            'created_at' => date("Y-m-d H:m:s"),
            'user_id' => 3,
            'status_id'=>1
        ]);

        DB::table('tasks')->insert([
            'title' => Str::random(10),
            'description' => Str::random(40),
            'created_at' => date("Y-m-d H:m:s"),
            'user_id' => 4,
            'status_id'=>1
        ]);

        DB::table('tasks')->insert([
            'title' => Str::random(10),
            'description' => Str::random(40),
            'created_at' => date("Y-m-d H:m:s"),
            'user_id' => 5,
            'status_id'=>1
        ]);

        DB::table('tasks')->insert([
            'title' => Str::random(10),
            'description' => Str::random(40),
            'created_at' => date("Y-m-d H:m:s"),
            'user_id' => 1,
            'status_id'=>1
        ]);
    }
}
