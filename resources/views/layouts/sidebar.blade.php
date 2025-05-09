<h4 class="logo-title"><i class="bi bi-trophy-fill"></i> FutAnalytics</h4>

<ul class="nav flex-column mb-auto">

    <li class="nav-item mb-2">
        <a class="nav-link d-flex align-items-center {{ request()->is('dashboard') ? 'active' : '' }}" href="#">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>
    </li>

    <li class="nav-item mb-2">
        <a class="nav-link d-flex align-items-center {{ request()->is('times*') ? 'active' : '' }}" href="#">
            <i class="bi bi-people-fill me-2"></i> Times
        </a>
    </li>

    <!-- Campeonatos com submenu -->
    <li class="nav-item mb-2">
        <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenuCampeonatos" role="button" aria-expanded="false" aria-controls="submenuCampeonatos">
            <span><i class="bi bi-trophy me-2"></i> Campeonatos</span>
            <i class="bi bi-chevron-down small"></i>
        </a>
        <div class="collapse ps-4 mt-1 {{ request()->is('campeonatos*') ? 'show' : '' }}" id="submenuCampeonatos">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link py-1 {{ request()->is('campeonatos/list') ? 'active' : '' }}" href="{{ route('campeonatos.index') }}">
                        <i class="bi bi-list me-1"></i> Listar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-1 {{ request()->is('campeonatos/create') ? 'active' : '' }}" href="{{ route('campeonatos.create') }}">
                        <i class="bi bi-plus-circle me-1"></i> Criar
                    </a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item mb-2">
        <a class="nav-link d-flex align-items-center {{ request()->is('jogadores*') ? 'active' : '' }}" href="#">
            <i class="bi bi-person-fill me-2"></i> Jogadores
        </a>
    </li>

</ul>

<form action="{{ route('logout') }}" method="POST" class="mt-4">
    @csrf
    <button type="submit" class="btn btn-outline-danger w-100">
        <i class="bi bi-box-arrow-right me-2"></i> Sair
    </button>
</form>