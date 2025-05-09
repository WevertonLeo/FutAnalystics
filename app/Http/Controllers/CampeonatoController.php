<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CampeonatoController extends Controller
{
    public function index(Request $request){
        $campeonatos = Campeonato::orderBy('created_at', 'desc')->paginate(10);
        return view('campeonatos.index', compact('campeonatos'));
    }

    public function create(){
        return view('campeonatos.create');
    }

    public function store(Request $request){

        try {
            $data = $request->validate([
                'nome'      => 'required|string|max:255',
                'temporada' => 'required|integer',
                'tipo'      => 'required|integer',
                'qt_times' => 'required|integer'
            ]);

            Campeonato::create($data);
            return redirect()->route('campeonatos.index')->with('success', 'Campeonato cadastrado com sucesso!');
        } catch (\Exception  $e) {
            Log::error('Erro ao criar campeonato: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Erro ao criar o campeonato. Tente novamente!');
        }

    }

    public function edit(Campeonato $campeonato){
        return view('campeonatos.edit', compact('campeonato'));
    }
}
