<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home')}}">Projeto Aprend!</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.create') }}">Create User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('posts') }}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Gerenciar posts</a>
        </li>

        <li class="nav-item">

          @auth
          <p style="font-weight: bold" class="nav-link">Olá, {{ auth()->user()->firstName }} | <a href="{{ route('login.destroy') }}">Logout</a></p>
          @endauth

          @guest
            <p style="font-weight: bold" class="nav-link">Olá, Bem vindo visitante.</p>
          @endguest

        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>