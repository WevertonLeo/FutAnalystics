@extends('layouts.app')

@section('content')
<div class="container-fluid px-4 mt-4">

    {{-- Boas-vindas --}}
    @auth
        <div class="alert alert-light border d-flex justify-content-between align-items-center shadow-sm rounded">
            <div>
                <i class="bi bi-person-fill-check me-2 text-primary fs-5"></i>
                <strong>Olá, {{ Auth::user()->name }}!</strong> Bem-vindo ao painel FutAnalytics.
            </div>
            <span class="text-muted small">{{ Auth::user()->email }}</span>
        </div>
    @endauth

    {{-- Métricas --}}
    <div class="row g-4 mt-3">

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-primary">
                        <i class="bi bi-trophy-fill fs-1"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total de Campeonatos</h6>
                        <h3 class="fw-bold mb-0">{{ $totalCampeonatos }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-success">
                        <i class="bi bi-people-fill fs-1"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total de Jogadores</h6>
                        <h3 class="fw-bold mb-0">{{ $totalJogadores }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-white h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3 text-warning">
                        <i class="bi bi-calendar-check-fill fs-1"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Jogos Realizados</h6>
                        <h3 class="fw-bold mb-0">{{ $totalJogos }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Lista de Campeonatos --}}
    <div class="card shadow-sm border-0 mt-5">
        <div class="card-header bg-white border-bottom">
            <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Últimos Campeonatos Criados</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nome</th>
                            <th>Temporada</th>
                            <th>Tipo</th>
                            <th>Data de Criação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ultimosCampeonatos as $camp)
                            <tr>
                                <td><strong>{{ $camp->nome }}</strong></td>
                                <td>{{ $camp->temporada }}</td>
                                <td><span class="badge bg-secondary">{{ ucfirst($camp->tipo) }}</span></td>
                                <td>{{ $camp->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">Nenhum campeonato registrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection