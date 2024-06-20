@extends('master')

@section('content')
    
  <h2>Atualizar dados Usuário</h2>

  @if (session()->has('updated_success'))
    <x-alert key="success" :message="session()->get('updated_success')" />
    {{-- <p class="alert alert-success">{{ session()->get('success') }}</p> --}}
  @elseif (session()->has('error'))
    <x-alert key="danger" :message="session()->get('updated_error')" />
    {{-- <p class="alert alert-error"></p>{{ session()->get('error') }} --}}
  @endif

  <form action="{{ route('user.update', $user->id) }}" method="post">
  
    @csrf
    @method('put')

    <label for="nome">Primeiro Nome</label>
    <input type="text" class="form-control form-control-sm mb-2" name="firstName" placeholder="Primeiro nome" value="{{ $user->firstName }}">
    {{ $errors->first('firstName') }}
    <label for="lastName">Sobrenome</label>
    <input type="text" class="form-control form-control-sm mb-2" name="lastName" placeholder="Sobrenome" value="{{ $user->lastName }}">
    {{ $errors->first('lastName') }}
    <label for="email">Email</label>
    <input type="text" class="form-control form-control-sm mb-2" name="email" placeholder="Email" value="{{ $user->email }}">
    {{ $errors->first('email') }}

    <button type="submit" class="btn btn-success btn-sm mb-2">Editar Usuário</button>
  
  </form>

  <hr>

  <h2>Atualizar a senha do usuário</h2>

  @if (session()->has('password_success'))
  <x-alert key="success" :message="session()->get('password_success')" />
    {{-- <p class="alert alert-success">{{ session()->get('success') }}</p> --}}
  @elseif (session()->has('error'))
  <x-alert key="danger" :message="session()->get('password_error')" />
    {{-- <p class="alert alert-error"></p>{{ session()->get('error') }} --}}
  @endif

  <form action="{{ route('password.update', $user->id) }}" method="post">
  
    @csrf
    @method('put')

    <label for="firstName">Senha</label>
    <input type="text" class="form-control form-control-sm mb-2" name="password" placeholder="Senha">
    {{ $errors->first('password') }}
    <label for="lastName">Confirme sua senha</label>
    <input type="text" class="form-control form-control-sm mb-2" name="password_confirmation" placeholder="Confirme a senha">
    {{ $errors->first('password_confirmation') }}

    <button type="submit" class="btn btn-success btn-sm mb-2">Salvar a senha</button>
  
  </form>

@endsection