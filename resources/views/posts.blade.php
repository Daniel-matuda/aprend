@extends('master')

@section('content')
    <h2 class="text-center"
        style="font-family: 'Dancing Script', cursive; font-size: 2rem; font-weight: normal; margin-top: 20px;">Lista Aulas
    </h2>


    <hr>

    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-4 mb-3">
                <a href="{{ route('post', $post->slug) }}" style="text-decoration: none;">
                    <div class="card"
                        style="cursor: pointer; transition: all 0.3s; border-radius: 10px; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">


  
                         
                    


                        <div class="card-body" style="border: 1px solid #e0e0e0; border-radius: 10px;">
                            <p
                                style="font-family: 'Poppins', sans-serif; font-size: 1.5rem; font-weight: bold; margin-bottom: 10px;">
                                {{ $post->title }}</p>
                            <p style="font-size: 1.1rem; font-style: italic; color: #888;">Criado por:
                                <strong>{{ $post->user->fullName }}</strong></p>
                        </div>

                        <div class="d-flex flex-column align-items-center mt-3">

                            <a class="btn btn-info btn-sm mb-2" href="{{ route('post.edit', $post->id) }}" >Editar Aula</a>
        
                            <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm mb-2" type="submit">Deletar Aula</button>
                            </form>
        
                        </div>

                    
                    </div>

                </a>

            </div>
        @empty
            <p style="font-size: 1.1rem; font-style: italic; color: #888;"><strong>Nenhum post encontrado</strong></p>
        @endforelse
    </div>

    {{ $posts->appends(['s' => request()->query('s')])->links() }}

    <style>
        /* Estilo para o hover do card */
        .card:hover {
            border: 2px solid #007BFF;
            /* Borda azul escuro no hover */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            /* Sombra no hover */
        }
    </style>
@endsection

















