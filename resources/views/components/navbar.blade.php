<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top navbar-background">
  <div class="container-fluid">
    <a class="navbar-brand fst-italic my-font-title text-white" href="#">The Aulab Post</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active my-font-title text-white" aria-current="page" href=" {{ route ('homepage') }} ">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active my-font-title text-white" aria-current="page" href=" {{ route ('careers') }} ">Lavora con noi</a>
        </li>
      </ul>
        @auth
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="my-font-title text-white">Ciao </span><strong class="my-font-title text-white">{{ ucfirst(auth()->user()->name) }}!</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    @if(Auth::user()->is_admin)
                      <li><a class="dropdown-item my-font-title" href=" {{ route ('admin.dashboard') }} ">Dashboard Admin</a></li>
                      <li><hr class="dropdown-divider"></li>
                    @endif
                    @if(Auth::user()->is_revisor)
                      <li><a class="dropdown-item my-font-title" href=" {{ route ('revisor.dashboard') }} ">Dashboard Revisor</a></li>
                      <li><hr class="dropdown-divider"></li>
                    @endif
                    @if(Auth::user()->is_writer)
                      <li><a class="dropdown-item my-font-title" href=" {{ route ('writer.dashboard') }} ">Dashboard del redattore</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item my-font-title"
                        href="{{ route('article.create')}}">Inserisci Articolo</a></li>
                      <li><hr class="dropdown-divider"></li>
                    @endif
                  <li>
                    <form action="/logout" method="POST">
                      @csrf
                      <button class="dropdown-item my-font-title custom-exit-btn" type="submit">Esci</button>
                    </form>
                  </li>
                </ul>
              </li>
          </ul>
          @else
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link my-font-title text-white" href="/login"><i class="fa-solid fa-right-to-bracket fa-sm"></i> Accedi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link my-font-title text-white" href="/register"><i class="fa-solid fa-key fa-sm"></i> Registrati</a>
            </li>
          </ul>
          @endauth
          <form class="d-flex" method="GET" action="{{ route('article.search') }}">
            <input class="form-control me-2" type="search" aria-label="Search" name="query">
            <button class="btn btn-outline-info my-font-title text-white" type="submit">Cerca</button>
          </form>    
    </div>
  </div>
</nav>