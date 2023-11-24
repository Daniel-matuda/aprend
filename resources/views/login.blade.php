@extends('master')

@section('content')
  
  <h2 class="text-center" style="font-family: 'Dancing Script', cursive; font-size: 2rem; font-weight: normal; margin-top: 20px;">Login</h2>

  <hr>

  <div class="card mx-auto" style="max-width: 400px; padding: 20px;">
    <form action="{{ route('login.store') }}" method="post">
      @csrf

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="bahringer.dave@baumbach.net">
        {{ $errors->first('email') }}
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password" value="123">
        {{ $errors->first('password') }}
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label" for="remember">Lembrar</label>
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>

@endsection
