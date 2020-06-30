<?php

use App\Models\Dir;
use Illuminate\Database\Seeder;

class DirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Dir::insert([
            [
                'name' => 'help',
            ],
            [
                'name' => 'quickguide',
            ],
            [
                'name' => 'faq',
            ]
        ]);
    }
}
