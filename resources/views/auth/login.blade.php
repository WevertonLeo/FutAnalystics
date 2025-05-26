@extends('layouts.auth')

@section('content')
<h3 class="text-center auth-title mb-4">Entrar no FutAnalytics</h3>

@if ($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

<form method="POST" action="{{ url('/login') }}">
    @csrf

    <div class="mb-3 input-group-icon">
        <i class="bi bi-envelope form-icon"></i>
        <input type="email" name="email" class="form-control" placeholder="E-mail" required autofocus>
    </div>

    <div class="mb-3 input-group-icon">
        <i class="bi bi-lock form-icon"></i>
        <input type="password" name="password" class="form-control" placeholder="Senha" required>
    </div>

    <button class="btn btn-primary w-100">Entrar</button>
</form>

<div class="text-center mt-3">
    <a href="{{ route('register') }}" class="text-decoration-none">Não tem conta? Criar uma</a>
</div>

<div class="text-center footer-note mt-3">© {{ date('Y') }} FutAnalytics</div>
@endsection