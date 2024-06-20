<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public readonly Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::listAndSearch();

        return view('posts', [
            'title' => 'Lista de posts',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post_create', [
            'title' => 'Criar Aula'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $created = $this->post->create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id')
        ]);

        ($created) ?
            Session::flash('updated_success', 'Criado com sucesso'):
            Session::flash('updated_error', 'Erro ao Criar');

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Post',
            'post' => $post
        ]);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post_edit', [
            'title' => 'Editar Aula',
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required'
        ]);

        $updated = $post->update($validated);

        ($updated) ?
            Session::flash('updated_success', 'Atualizado com sucesso'):
            Session::flash('updated_error', 'Erro ao atualizar');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();

        $post->delete();

        return back();
    }
}
