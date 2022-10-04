<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ProjectLike::factory(17)->create();
    }
}
