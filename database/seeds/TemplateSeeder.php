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
            ['name' => '普通段落'],
            ['name' => '说明灰块'],
            ['name' => '表格'],
            ['name' => '数字列表'],
            ['name' => '方块列表'],
            ['name' => '图片'],
            ['name' => '标题'],
            ['name' => '二级标题加虚线'],
            ['name' => '代码块'],
        ]);
    }
}
