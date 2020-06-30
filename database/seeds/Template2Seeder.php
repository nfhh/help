<?php

use App\Models\Template2;
use Illuminate\Database\Seeder;

class Template2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Template2::insert([
            ['id' => 101, 'name' => '主标题'],
            ['id' => 102, 'name' => '二级标题加虚线'],
            ['id' => 103, 'name' => '三级标题'],
            ['id' => 104, 'name' => '普通段落'],
            ['id' => 105, 'name' => '数字列表'],
            ['id' => 106, 'name' => '方块列表'],
            ['id' => 107, 'name' => '说明灰块'],
            ['id' => 108, 'name' => '警告块'],
            ['id' => 109, 'name' => '代码块'],
            ['id' => 110, 'name' => '有边框表格'],
            ['id' => 111, 'name' => '无边框表格'],
            ['id' => 112, 'name' => '图片'],
        ]);
    }
}
