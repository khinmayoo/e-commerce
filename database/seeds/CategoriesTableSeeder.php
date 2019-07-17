<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = array(['name' => 'FOOD MENU', 'descriptions' => 'This is FOOD MENU'],
            ['name' => 'DESSERT MENU', 'descriptions' => 'This is DESSERT MENU'],
            ['name' => 'DRINK MENU', 'descriptions' => 'This is DRINK MENU']);

        DB::table('categories')->insert($records);
    }
}
