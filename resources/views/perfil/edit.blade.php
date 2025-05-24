@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-5">
                    <h3 class="mb-4 text-primary fw-bold text-center">
                        <i class="bi bi-person-lines-fill me-2"></i>Editar Perfil
                    </h3>

                    <form method="POST" action="{{ route('perfil.update', $user->id) }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nome completo</label>
                            <input type="text" name="name" class="form-control form-control-lg rounded-3" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">E-mail</label>
                            <input type="email" name="email" class="form-control form-control-lg rounded-3" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <hr class="my-4">

                        <h6 class="text-muted mb-3">Alterar Senha (opcional)</h6>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Nova senha</label>
                            <input type="password" name="password" class="form-control form-control-lg rounded-3" placeholder="Deixe em branco para manter">
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Confirmar nova senha</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg rounded-3">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary rounded-3">
                                <i class="bi bi-arrow-left"></i> Voltar
                            </a>
                            <button type="submit" class="btn btn-primary px-4 rounded-3">
                                <i class="bi bi-save2"></i> Salvar alterações
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection