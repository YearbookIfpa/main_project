<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
    
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="wd-30 ht-30 rounded-circle" src="{{ url('https://via.placeholder.com/30x30') }}" alt="profile">
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
          <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
            <div class="mb-3">
              <img class="wd-80 ht-80 rounded-circle" src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
            </div>
            <div class="text-center">
              <p class="tx-16 fw-bolder">Nome Usuário</p>
              <p class="tx-12 text-muted">teste@gmail.com</p>
            </div>
          </div>
          <ul class="list-unstyled p-1">
            <li class="dropdown-item py-2">
              <a href="{{ url('/general/profile') }}" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="user"></i>
                <span>Perfil</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="edit"></i>
                <span>Editar Perfil</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              <a href="javascript:;" class="text-body ms-0">
                <i class="me-2 icon-md" data-feather="repeat"></i>
                <span>Trocar Usuário</span>
              </a>
            </li>
            <li class="dropdown-item py-2">
              @auth
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                    <i class="me-2 icon-md" data-feather="log-out"></i>
                    <span>Sair</span>
                  </a>
              @endauth
              
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>