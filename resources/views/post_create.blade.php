@extends('master')

@section('content')
    
  <h2>Create Post</h2>

  @if (session()->has('success'))
    <x-alert key="success" :message="session()->get('success')" />
    {{-- <p class="alert alert-success">{{ session()->get('success') }}</p> --}}
  @elseif (session()->has('error'))
    <x-alert key="danger" :message="session()->get('error')" />
    {{-- <p class="alert alert-error"></p>{{ session()->get('error') }} --}}
  @endif

  <form action="{{ route('post.store') }}" method="post">
  
    @csrf

    <label for="title">Title</label>
    <input type="text" class="form-control form-control-sm" name="title" placeholder="Title">
    {{ $errors->first('title') }}
    <label for="slug">Slug</label>
    <input type="text" class="form-control form-control-sm" name="slug" placeholder="Slug">
    {{ $errors->first('lastName') }}
    <label for="content">content</label>
    <input type="text" class="form-control form-control-sm" name="content" placeholder="Content">
    {{ $errors->first('content') }}

    <button type="submit" class="btn btn-success btn-sm">Save</button>
  
  </form>

@endsection