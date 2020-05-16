<?php

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Template::insert([
            ['name' => '样式1'],
            ['name' => '样式2'],
            ['name' => '样式3'],
            ['name' => '样式4'],
            ['name' => '样式5'],
            ['name' => '样式6'],
            ['name' => '样式7'],
            ['name' => '样式8'],
            ['name' => '样式9'],
            ['name' => '样式10'],
        ]);
    }
}
