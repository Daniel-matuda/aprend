@extends('master')

@section('content')
    
  <h2>Atualizar dados da Aula</h2>

  @if (session()->has('updated_success'))
    <x-alert key="success" :message="session()->get('updated_success')" />
    {{-- <p class="alert alert-success">{{ session()->get('success') }}</p> --}}
  @elseif (session()->has('error'))
    <x-alert key="danger" :message="session()->get('updated_error')" />
    {{-- <p class="alert alert-error"></p>{{ session()->get('error') }} --}}
  @endif

  <form action="{{ route('post.update', $post->id) }}" method="post">
  
    @csrf
    {{-- @method('put') --}}

    <input type="hidden" name="_method" value="PUT">
    

    <label for="title">Título da aula</label>
    <input type="text" class="form-control form-control-sm mb-2" name="title" placeholder="Título da Aula">
    {{ $errors->first('title') }}
    <label for="slug">Assunto</label>
    <input type="text" class="form-control form-control-sm mb-2" name="slug" placeholder="Assunto da Aula">
    {{ $errors->first('slug') }}
    <label for="content">Conteúdo da Aula</label>
    <input type="text" class="form-control form-control-sm mb-2" name="content" placeholder="Insira o conteúdo da Aula">
    {{ $errors->first('content') }}

    <button type="submit" class="btn btn-success btn-sm">Salvar</button>
  
  </form>


@endsection