<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->insert([
            'title' => "Pending",
            'description' => "Task pending",
            'created_at' => date("Y-m-d H:m:s"),
        ]);

        DB::table('task_statuses')->insert([
            'title' => "In progress",
            'description' => "Task in progress",
            'created_at' => date("Y-m-d H:m:s"),
        ]);

        DB::table('task_statuses')->insert([
            'title' => "Done",
            'description' => "Task done",
            'created_at' => date("Y-m-d H:m:s"),
        ]);
    }
}
