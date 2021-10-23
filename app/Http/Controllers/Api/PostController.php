<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// import model Post 
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //parametro order dinamico para
        // prendiamo dalla query il parametro order e definiamo un default
        $order = $request->query('order') ?? 'asc';
        $posts = Post::orderBy('id', $order)->paginate(5);
        // eloquent restituisce sempre una collection 

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //ritoriamo il post in json
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $post=Post::findOrFail($id);
        // $post->delete();

        Post::destroy($id);

        // non mi aspetto una risposta json ma una risposta ok con 204
        return response(' ', 204);
        // operazione andata a buon fino ma non ho niente da mostrarti 
    }
}
