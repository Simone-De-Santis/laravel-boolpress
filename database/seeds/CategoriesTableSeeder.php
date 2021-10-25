<?php

use Illuminate\Database\Seeder;
// import model category 
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_name = ['HTML', 'CSS', 'JS', 'PHP', 'VueJs', 'Laravel'];
        foreach ($category_name as $name) {
            $category = new Category();
            $category->name = $name;
            $category->slug = Str::slug($name, '-');
            $category->save();
        }
    }
}
