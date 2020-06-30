<?php

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
        // $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(TemplateSeeder::class);
        $this->call(Template2Seeder::class);
        $this->call(DirSeeder::class);
        $this->call(MenuSeeder::class);
    }
}
