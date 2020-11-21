<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        // \App\Models\Service::factory(30)->create();
        // \App\Models\Project::factory(30)->create();
        \App\Models\OtherContent::factory(1)->create();
    }
}
