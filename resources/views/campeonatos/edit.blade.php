@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i> Editar Campeonato</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('campeonatos.update', $campeonato) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Campeonato</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ $campeonato->nome }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="temporada" class="form-label">Temporada</label>
                            <input type="number" class="form-control" id="temporada" name="temporada" value="{{ $campeonato->temporada }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo de Campeonato</label>
                            <select class="form-select" id="tipo" name="tipo" required>
                                <option value="">Selecione o tipo</option>
                                <option value="1" @selected($campeonato->tipo == 1)>Pontos Corridos</option>
                                <option value="2" @selected($campeonato->tipo == 2)>Mata-Mata</option>
                                <option value="3" @selected($campeonato->tipo == 3)>Grupos + Mata-Mata</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="qt_times" class="form-label">Quantidade de Times</label>
                            <input type="number" class="form-control" id="qt_times" name="qt_times" value="{{ $campeonato->qt_times }}" min="2" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check2-circle me-1"></i> Editar Campeonato
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection