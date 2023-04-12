<header>
  <nav class="navbar navbar-expand-sm ">
    <div class="container-fluid ">
      <a class="navbar-brand " href="{{URL('/')}}">
        <img src="{{URL('imgs/logo.png')}}" height="24" width="30" alt="LOGO">
        Biblioteca
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('books')}}">Livros</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="">Linguagens</a></li>
              <li><a class="dropdown-item" href="#">Arquitetura</a></li>
              <li><a class="dropdown-item" href="#">Banco de dados</a></li>
              <li><a class="dropdown-item" href="#">Derivados</a></li>
            </ul>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" id="dropAccount" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Perfil</a></li>

              @can('isAdmin')
              <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a></li>
              @endcan

              <li><a class="dropdown-item" href="{{route('logout')}}">Sair</a></li>
            </ul>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{URL('/login')}}">Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
</header>
