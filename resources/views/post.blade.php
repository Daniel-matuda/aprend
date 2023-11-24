@extends('master')

@section('content')
    
  <div class="container mt-4">
    <div class="card">
      <div class="card-header">
        <h2 class="text-center" style="font-family: 'Dancing Script', cursive; font-size: 2rem; font-weight: normal;">{{ $post->title }}</h2>
      </div>
      <div class="card-body">
        <p style="font-family: 'Poppins', sans-serif; font-size: 1rem;">{{ $post->content }}</p>
      </div>
    </div>
  </div>

@endsection