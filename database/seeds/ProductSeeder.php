<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Product::insert([
            [
                'name' => 'D2-310',
                'sort' => '2',
            ],
            [
                'name' => 'D2 Thunderbolt 3',
                'sort' => '4',
            ],
            [
                'name' => 'D4-310',
                'sort' => '6',
            ],
            [
                'name' => 'D5-300',
                'sort' => '8',
            ],
            [
                'name' => 'D5-300C',
                'sort' => '10',
            ],
            [
                'name' => 'D4 Thunderbolt 3',
                'sort' => '12',
            ],
            [
                'name' => 'D5 Thunderbolt 3',
                'sort' => '14',
            ],
            [
                'name' => 'D8 Thunderbolt 3',
                'sort' => '16',
            ],
            [
                'name' => 'D16 Thunderbolt3',
                'sort' => '18',
            ],
            [
                'name' => 'F2-210',
                'sort' => '20',
            ],
            [
                'name' => 'F2-220',
                'sort' => '22',
            ],
            [
                'name' => 'F2-221',
                'sort' => '24',
            ],
            [
                'name' => 'F2-420',
                'sort' => '26',
            ],
            [
                'name' => 'F2-421',
                'sort' => '28',
            ],
            [
                'name' => 'F2-422',
                'sort' => '30',
            ],
            [
                'name' => 'F4-210',
                'sort' => '32',
            ],
            [
                'name' => 'F4-220',
                'sort' => '34',
            ],
            [
                'name' => 'F4-221',
                'sort' => '36',
            ],
            [
                'name' => 'F4-420',
                'sort' => '38',
            ],
            [
                'name' => 'F4-421',
                'sort' => '40',
            ],
            [
                'name' => 'F4-422',
                'sort' => '42',
            ],
            [
                'name' => 'F5-220',
                'sort' => '44',
            ],
            [
                'name' => 'F5-221',
                'sort' => '46',
            ],
            [
                'name' => 'F5-225',
                'sort' => '48',
            ],
            [
                'name' => 'F5-420',
                'sort' => '50',
            ],
            [
                'name' => 'F5-421',
                'sort' => '52',
            ],
            [
                'name' => 'F5-422',
                'sort' => '54',
            ],
            [
                'name' => 'F8-421',
                'sort' => '56',
            ],
            [
                'name' => 'F8-422',
                'sort' => '58',
            ],
            [
                'name' => 'U8-412',
                'sort' => '60',
            ],
            [
                'name' => 'U8-420',
                'sort' => '62',
            ],
            [
                'name' => 'U8-612',
                'sort' => '64',
            ],
            [
                'name' => 'U12-412',
                'sort' => '66',
            ],
            [
                'name' => 'U12-420',
                'sort' => '68',
            ],
            [
                'name' => 'U12-820',
                'sort' => '70',
            ],
            [
                'name' => 'U16-412',
                'sort' => '72',
            ],
            [
                'name' => 'U16-420',
                'sort' => '74',
            ],
            [
                'name' => 'F4-300',
                'sort' => '76',
            ]
        ]);
    }
}
