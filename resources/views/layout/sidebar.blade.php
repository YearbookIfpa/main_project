<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Yearbook<span>IFPA</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Início</li>
      <li class="nav-item {{ active_class(['/']) }}">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['tipo_usuario']) }}">
        <a href="{{ route('tipo_usuario.index') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Tipo Usuário</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['usuario/*']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button" aria-expanded="{{ is_active_route(['usuario/*']) }}" aria-controls="email">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Usuário</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['usuario/*']) }}" id="email">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('/email/inbox') }}" class="nav-link {{ active_class(['email/inbox']) }}">Inbox</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/email/read') }}" class="nav-link {{ active_class(['email/read']) }}">Read</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}">Compose</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ active_class(['usuario']) }}">
        <a href="{{ route('tipo_usuario.index') }}" class="nav-link">
          <i class="link-icon" data-feather="chevrons-right"></i>
          <span class="link-title">Instuição</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['usuario']) }}">
        <a href="{{ route('tipo_usuario.index') }}" class="nav-link">
          <i class="link-icon" data-feather="chevrons-right"></i>
          <span class="link-title">Campus</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['usuario']) }}">
        <a href="{{ route('tipo_usuario.index') }}" class="nav-link">
          <i class="link-icon" data-feather="chevrons-right"></i>
          <span class="link-title">Cidade</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['usuario']) }}">
        <a href="{{ route('tipo_usuario.index') }}" class="nav-link">
          <i class="link-icon" data-feather="chevrons-right"></i>
          <span class="link-title">Estado</span>
        </a>
      </li>
      
      
      
    </ul>
  </div>
</nav>
