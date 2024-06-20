@extends('master')

@section('content')
    
  <h2 class="text-center" style="font-family: 'Dancing Script', cursive; font-size: 2rem; font-weight: normal; margin-top: 20px;">Listagem de usuários</h2>

  <hr>

  <div class="row">
    @foreach ($users as $user)
      <div class="col-md-3 mb-3">
        <div class="card">
          <h4 class="card-header">
            <a style="text-decoration: none" href="{{ route('user.show', $user->id) }}">{{ $user->fullName }}</a>
          </h4>

          <div class="card-body">
            <div class="d-flex flex-column align-items-center">
              <a class="btn btn-info btn-sm mb-2" href="{{ route('user.edit', $user->id) }}" >Editar Usuário</a>
              <form action="{{ route('user.destroy', $user->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm mb-2" type="submit">Deletar Usuário</button>
              </form>

              <small>Criou {{ $user->posts->count() }} Aulas </small>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{ $users->links() }}


@endsection