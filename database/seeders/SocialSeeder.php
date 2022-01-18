<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Sfneal\Socials\Models\Social;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Social::factory()
            ->count(5)
            ->create();
    }
}
