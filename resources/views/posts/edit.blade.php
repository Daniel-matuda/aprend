@extends('master')

@section('content')
    <div class="container mt-4">
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')

            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" required>

            <label for="content">Conteúdo:</label>
            <textarea id="content" name="content" required>{{ $post->content }}</textarea>

            <!-- Adicione um campo oculto para o slug -->
            <input type="hidden" id="slug" name="slug" value="{{ $post->slug }}">

            <button type="submit">Atualizar Post</button>
        </form>
    </div>
@endsection
