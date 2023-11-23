@extends('master')

@section('content')
    
  <h2 class="text-center" style="font-family: 'Dancing Script', cursive; font-size: 2rem; font-weight: normal; margin-top: 20px;">Lista de users</h2>

  <hr>

  <div class="row">
    @foreach ($users as $user)
      <div class="col-md-3 mb-3">
        <div class="card">
          <h4 class="card-header">
            {{ $user->fullName }}
          </h4>

          <div class="card-body">
            <div class="d-flex flex-column align-items-center">
              <a class="btn btn-info btn-sm mb-2" href="{{ route('user.edit', $user->id) }}" >Edit</a>
              <form action="{{ route('user.destroy', $user->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger btn-sm mb-2" type="submit">Deletar</button>
              </form>

              {{-- <small>Criou {{ $user->posts->count() }} Objetivos estratégicos</small> --}}
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  {{ $users->links() }}


@endsection