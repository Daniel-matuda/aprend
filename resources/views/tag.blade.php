@extends('master')

@section('content')
    
  <div class="container mt-4">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center" style="font-family: 'Dancing Script', cursive; font-size: 2rem; font-weight: normal;">{{ $tag->name }}</h2>
      </div>
      <div class="card-body">
        <p style="font-family: 'Poppins', sans-serif; font-size: 1rem;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt possimus, laboriosam obcaecati nobis, nisi reprehenderit deleniti quos eius sed consectetur veritatis hic maiores cumque dicta eveniet ipsam debitis neque modi.</p>

        <hr>

        <h4>Posts:</h4>

        @forelse ($tag->posts as $post)
            <a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
        @empty
          <p style="font-family: 'Poppins', sans-serif; font-size: 1rem;">Nenhum Post cadastrado para essa tag</p>
        @endforelse
      </div>
    </div>
  </div>

@endsection
