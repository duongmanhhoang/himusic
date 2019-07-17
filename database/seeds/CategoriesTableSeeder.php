<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                'type' => 'album',
                'name' => 'Miền Bắc',
                'slug' => 'mien-bac'
            ),
            array(
                'type' => 'album',
                'name' => 'Miền Trung',
                'slug' => 'mien-trung'
            ),
            array(
                'type' => 'album',
                'name' => 'Miền Nam',
                'slug' => 'mien-nam'
            )
        );
        Category::insert($data);
    }
}
