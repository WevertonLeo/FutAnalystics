<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FutAnalytics</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
            padding: 1rem;
        }
        .sidebar .nav-link {
            color: #333;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #e9ecef;
            border-radius: 0.375rem;
        }
        .sidebar .logo-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #0d6efd;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 1040;
                width: 250px;
                left: -250px;
                top: 0;
                bottom: 0;
                background-color: #fff;
                transition: left 0.3s ease;
            }
            .sidebar.show {
                left: 0;
            }
            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1030;
                display: none;
            }
            .overlay.show {
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column" id="sidebarMenu">
        <h4 class="logo-title mb-4"><i class="bi bi-trophy-fill me-2"></i>FutAnalytics</h4>
        <ul class="nav flex-column mb-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="#">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('times*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-people-fill me-2"></i> Times
                </a>
            </li>
            <!-- Campeonatos com submenu -->
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenuCampeonatos" role="button" aria-expanded="{{ request()->is('campeonatos*') ? 'true' : 'false' }}">
                    <span><i class="bi bi-trophy me-2"></i> Campeonatos</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse ps-3 {{ request()->is('campeonatos*') ? 'show' : '' }}" id="submenuCampeonatos">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('campeonatos') ? 'active' : '' }}" href="{{ route('campeonatos.index') }}">
                                <i class="bi bi-list me-1"></i> Listar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('campeonatos/create') ? 'active' : '' }}" href="{{ route('campeonatos.create') }}">
                                <i class="bi bi-plus-circle me-1"></i> Criar
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('jogadores*') ? 'active' : '' }}" href="#">
                    <i class="bi bi-person-fill me-2"></i> Jogadores
                </a>
            </li>
        </ul>

        <!-- Botão de logout -->
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100">
                <i class="bi bi-box-arrow-right me-2"></i> Sair
            </button>
        </form>
    </nav>

    <!-- Overlay para mobile -->
    <div class="overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Main content -->
    <div class="flex-grow-1 p-3">
        <!-- Botão para abrir o menu no mobile -->
        <button class="btn btn-outline-secondary d-md-none mb-3" onclick="toggleSidebar()">
            <i class="bi bi-list"></i> Menu
        </button>

        <!-- Flash messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Erros encontrados:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Conteúdo dinâmico -->
        @yield('content')
    </div>
</div>

<!-- Bootstrap JS (com Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebarMenu');
        const overlay = document.getElementById('sidebarOverlay');
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    }
</script>

</body>
</html>