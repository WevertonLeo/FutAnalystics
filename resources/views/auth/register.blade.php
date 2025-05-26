@extends('layouts.auth')

@section('content')
<h3 class="text-center auth-title mb-4">Criar Conta</h3>

@if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

<form method="POST" action="{{ url('/register') }}">
    @csrf

    <div class="mb-3 input-group-icon">
        <i class="bi bi-person form-icon"></i>
        <input type="text" name="name" class="form-control" placeholder="Nome completo" required>
    </div>

    <div class="mb-3 input-group-icon">
        <i class="bi bi-envelope form-icon"></i>
        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
    </div>

    <div class="mb-3 input-group-icon">
        <i class="bi bi-lock form-icon"></i>
        <input type="password" name="password" class="form-control" placeholder="Senha" required>
    </div>

    <div class="mb-3 input-group-icon">
        <i class="bi bi-lock-fill form-icon"></i>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar senha" required>
    </div>

    <button class="btn btn-success w-100">Criar Conta</button>
</form>

<div class="text-center mt-3">
    <a href="{{ route('login') }}" class="text-decoration-none">Já tem conta? Entrar</a>
</div>

<div class="text-center footer-note mt-3">© {{ date('Y') }} FutAnalytics</div>
@endsection