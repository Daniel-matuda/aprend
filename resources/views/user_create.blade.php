@extends('master')

@section('content')
    
  <h2>Criar um Usuário</h2>

  <hr>

  @if (session()->has('success'))
    <x-alert key="success" :message="session()->get('success')" />
    {{-- <p class="alert alert-success">{{ session()->get('success') }}</p> --}}
  @elseif (session()->has('error'))
    <x-alert key="danger" :message="session()->get('error')" />
    {{-- <p class="alert alert-error"></p>{{ session()->get('error') }} --}}
  @endif

  <form action="{{ route('user.store') }}" method="post">
  
    @csrf

    <label for="firstName">Primeiro Nome</label>
    <input type="text" class="form-control form-control-sm mb-2" name="firstName" placeholder="Digite seu primeiro nome">
    {{ $errors->first('firstName') }}
    <label for="lastName">Sobrenome</label>
    <input type="text" class="form-control form-control-sm mb-2" name="lastName" placeholder="Digite seu sobrenome">
    {{ $errors->first('lastName') }}
    <label for="email">Email</label>
    <input type="text" class="form-control form-control-sm mb-2" name="email" placeholder="Digite seu Email">
    {{ $errors->first('email') }}
    <label for="password">Senha</label>
    <input type="password" class="form-control form-control-sm mb-2" name="password" placeholder="Digite sua senha">
    {{ $errors->first('password') }}

    <button type="submit" class="btn btn-success btn-sm">Criar usuário</button>
  
  </form>

@endsection