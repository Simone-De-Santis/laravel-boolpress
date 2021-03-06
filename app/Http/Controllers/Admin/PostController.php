<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Controllers\Controller;
// IMPORT MODEL CATEGORIES
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
        // paginiamo i risultati 
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dipendenza vuota per evitare un errore nel form condiviso con edit
        $post = new Post();
        $categories = Category::all();
        return view('admin.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([

            'title' => 'required|string|unique:posts|min:5',
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => 'nullable|exists:categories,id'
        ], [
            // generic costum message
            'required' => 'Il campo :attribute è obligatorio',
            // specific costum message
            'title.unique' => 'Il titolo esiste già',
        ]);

        $data = request()->all();
        $post = new Post();
        // dati utente loggato creatore del post
        $data['user_id'] = Auth::id();
        $post->fill($data);
        // add use STRING
        $post->slug = Str::slug($post->title, '-');
        $post->save();
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // validation
        $request->validate([

            'title' => ['required', 'string', Rule::unique('posts')->ignore($post->id), 'min:5'],
            'content' => 'required|string',
            'image' => 'string',
            'category_id' => 'nullable|exists:categories,id'

        ], [
            // generic costum message
            'required' => 'Il campo :attribute è obligatorio',
            // specific costum message
            'title.unique' => 'Il titolo esiste già',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        $post->update($data);
        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('admin.posts.index')->with('alert-message', 'Your post deleted successfully')->with('alert-type', 'warning');
    }
}
