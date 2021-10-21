<?php

use Illuminate\Database\Seeder;
// import model
use App\Models\Post;
// import string per slugs 
use Illuminate\Support\Str;
// import faker
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            // instanziamo nuovo elemento 
            $Post = new Post();
            // tramite la docs di faker php vediamo i parametri da passare
            $Post->title = $faker->words(5, true);
            $Post->content = $faker->text(200);
            $Post->image = $faker->imageUrl(360, 360);

            $Post->slug = Str::slug($Post->title, '-');
            // salviamo elemento nel db
            $Post->save();
        }
    }
}
