@extends('master')

@section('content')
    
  <div class="container mt-4">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center" style="font-family: 'Dancing Script', cursive; font-size: 2rem; font-weight: normal;">{{ $user->fullName }}</h2>
      </div>
      <div class="card-body">
        @if ($user->posts->count() > 0)

          <p style="font-weight: bold; font-family: 'Poppins', sans-serif; font-size: 2rem;"> Posts: </p>

          <hr>

          <ul>
            @foreach ($user->posts as $post)
            <li><a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a></li> 
            @endforeach
          </ul>

        @endif

      </div>


    </div>
  </div>

@endsection