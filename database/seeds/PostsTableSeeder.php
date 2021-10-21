<?php

use Illuminate\Database\Seeder;
// import model
use App\Models\Post;
// import string per slugs 
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ! 1 metodo
        // inseriamo un array associativo dei dati di un post 
        $posts = [
            [
                'title' => 'primo post',
                'content' => 'contenuto post 1',
                'image' => 'http://bla bla bal'

            ],   [
                'title' => 'secondo post',
                'content' => 'contenuto post 2',
                'image' => 'http://bla bla bal'

            ],   [
                'title' => 'terzo post',
                'content' => 'contenuto post 3',
                'image' => 'http://bla bla bal'

            ],   [
                'title' => 'quarto post',
                'content' => 'contenuto post 4',
                'image' => 'http://bla bla bal'

            ],   [
                'title' => 'quinto post',
                'content' => 'contenuto post 5',
                'image' => 'http://bla bla bal'

            ]
        ];

        //cicliamo sopra gli array inseritine creiamo un nuovo record 

        foreach ($posts as $post) {
            // instanziamo il nuovo post (bisogna importare il modello )
            $newPost = new Post();
            $newPost->title = $post['title'];
            $newPost->content = $post['content'];
            $newPost->image = $post['image'];

            // importiamo string per usare il suo metodo della creazione dello slug
            $newPost->slug = Str::slug($post['title'], '-');
            $newPost->save();
        }
    }
}
