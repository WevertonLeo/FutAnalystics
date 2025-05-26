<?php
namespace App\Http\Controllers;

use App\Models\Campeonato;
use App\Models\Jogador;
use App\Models\Jogo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $totalCampeonatos = Campeonato::count();
        // $totalJogadores = Jogador::count();
        // $totalJogos = Jogo::count();

        $totalCampeonatos = 5;
        $totalJogadores = 15;
        $totalJogos = 18;

        $user = Auth::user();
        $ultimosCampeonatos = Campeonato::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCampeonatos',
            'totalJogadores',
            'totalJogos',
            'ultimosCampeonatos',
            'user'
        ));
    }
}