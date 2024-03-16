<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fst-italic" href="#">The Aulab Post</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=" {{ route ('homepage') }} ">Home</a>
        </li>
      </ul>
        @auth
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Benvenuto <strong>{{ auth()->user()->name }}</strong>!
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item"
                    href="{{ route('article.index')}}">Gestisti Articoli</a></li>
                  <li><hr class="dropdown-divider"></li>
                    @if(Auth::user()->is_admin)
                      <li><a class="dropdown-item" href=" {{ route ('admin.dashboard') }} ">Dashboard Admin</a></li>
                      <li><hr class="dropdown-divider"></li>
                    @endif
                    @if(Auth::user()->is_revisor)
                      <li><a class="dropdown-item" href=" {{ route ('revisor.dashboard') }} ">Dashboard Revisor</a></li>
                      <li><hr class="dropdown-divider"></li>
                    @endif
                  <li><a class="dropdown-item"
                    href="{{ route('article.create')}}">Inserisci Articolo</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item"
                    href="">Gestisti Categorie</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button class="dropdown-item" type="submit">Esci</button>
                    </form>
                  </li>
                </ul>
              </li>
          </ul>
          @else
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/login"><i class="fa-solid fa-right-to-bracket fa-lg"></i> Accedi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register"><i class="fa-solid fa-key"></i> Registrati</a>
            </li>
          </ul>
          @endauth      
    </div>
  </div>
</nav>