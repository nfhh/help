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
            ['name' => '主标题'],
            ['name' => '二级标题加虚线'],
            ['name' => '三级标题'],
            ['name' => '普通段落'],
            ['name' => '数字列表'],
            ['name' => '方块列表'],
            ['name' => '说明灰块'],
            ['name' => '警告块'],
            ['name' => '代码块'],
            ['name' => '有边框表格'],
            ['name' => '无边框表格'],
            ['name' => '图片'],
        ]);
    }
}
