<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->paginate(20);

        return view('posts.index', [
            'title' => 'Lista de posts',
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', [
            'title' => 'Criar Novo Post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => Str::slug($request->input('title')),
            'user_id' => null, // ou defina o user_id conforme necessário
        ]);

        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'title' => 'Detalhes do Post',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'title' => 'Editar Post',
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => Str::slug($request->input('title')),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post excluído com sucesso!');
    }
}
