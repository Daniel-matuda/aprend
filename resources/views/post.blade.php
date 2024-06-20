@extends('master')

@section('content')
    
  <div class="container mt-4">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center" style="font-family: 'Dancing Script', cursive; font-size: 2rem; font-weight: normal;">{{ $post->title }}</h2>
      </div>
      <div class="card-body">
        <p style="font-family: 'Poppins', sans-serif; font-size: 1rem;">{{ $post->content }}</p>

        <hr>

        <h4>Tags:</h4>

        @forelse ($post->tags as $tag)
            <a href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a>
        @empty
          <p style="font-family: 'Poppins', sans-serif; font-size: 1rem;">Nenhuma Tag cadastrada para esse post</p>
        @endforelse


      </div>
    </div>
  </div>

@endsection