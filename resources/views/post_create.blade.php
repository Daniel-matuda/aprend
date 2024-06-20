@extends('master')

@section('content')
    
  <h2>Criar um Aula</h2>

  <hr>


  @if (session()->has('success'))
    <x-alert key="success" :message="session()->get('success')" />
    {{-- <p class="alert alert-success">{{ session()->get('success') }}</p> --}}
  @elseif (session()->has('error'))
    <x-alert key="danger" :message="session()->get('error')" />
    {{-- <p class="alert alert-error"></p>{{ session()->get('error') }} --}}
  @endif

  <form action="{{ route('post.store') }}" method="post">
  
    @csrf

    <label for="title">Título da Aula</label>
    <input type="text" class="form-control form-control-sm mb-2" name="title" placeholder="Digite o título da aula">
    {{ $errors->first('title') }}
    <label for="slug">Assunto</label>
    <input type="text" class="form-control form-control-sm mb-2" name="slug" placeholder="Digite o assunto da aula">
    {{ $errors->first('slug') }}
    <label for="content">Digite o conteúdo da Aula</label>
    <input type="text" class="form-control form-control-sm mb-2" name="content" placeholder="Digite o conteúdo da aula">
    {{ $errors->first('content') }}
    <label for="user_id">Digite a matrícula do dono da Aula</label>
    <input type="text" class="form-control form-control-sm mb-2" name="user_id" placeholder="Digite o número do criador da Aula">
    {{ $errors->first('user_id') }}

    <button type="submit" class="btn btn-success btn-sm mb-2">Criar Aula</button>
  
  </form>

@endsection