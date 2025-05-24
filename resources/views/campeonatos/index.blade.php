@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                <h2 class="fw-bold mb-2 mb-md-0 text-primary">🏆 Campeonatos</h2>
                <a href="{{ route('campeonatos.create') }}" class="btn btn-success shadow-sm">
                    <i class="bi bi-plus-circle me-1"></i> Novo Campeonato
                </a>
            </div>
        </div>
    </div>
    @if ($campeonatos->isEmpty())
        <div class="alert alert-info">
            Nenhum campeonato cadastrado ainda.
        </div>
    @else
        <div class="list-group">
            @foreach ($campeonatos as $campeonato)
                <div class="list-group-item mb-3 p-4 rounded shadow-sm border-0">
                    <div class="d-flex justify-content-between flex-wrap align-items-start">
                        <div class="flex-grow-1">
                            <h4 class="fw-semibold text-dark mb-2">
                                {{ $campeonato->nome }}
                            </h4>

                            <div class="row small text-secondary fw-medium">
                                <div class="col-6 col-md-auto mb-1">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    Temporada: <span class="text-dark">{{ $campeonato->temporada }}</span>
                                </div>
                                <div class="col-6 col-md-auto mb-1">
                                    <i class="bi bi-list-stars me-1"></i>
                                    Tipo: <span class="text-capitalize text-dark">{{ str_replace('_', ' ', $campeonato->tipo) }}</span>
                                </div>
                                <div class="col-6 col-md-auto mb-1">
                                    <i class="bi bi-people-fill me-1"></i>
                                    Times: <span class="text-dark">{{ $campeonato->qt_times }}</span>
                                </div>
                                <div class="col-6 col-md-auto mb-1">
                                    <i class="bi bi-clock me-1"></i>
                                    Criado em: <span class="text-dark">{{ $campeonato->created_at->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-3 mt-md-0">
                            <a href="{{ route('campeonatos.edit', $campeonato->id)}}" class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                <i class="bi bi-pencil-fill me-1"></i> Editar
                            </a>
                            <form action="" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger d-flex align-items-center">
                                    <i class="bi bi-trash-fill me-1"></i> Excluir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $campeonatos->links('vendor.pagination.bootstrap-5') }}
        </div>
    @endif
</div>
@endsection