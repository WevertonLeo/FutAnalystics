<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CampeonatoController extends Controller
{
    public function index(Request $request){
        $campeonatos = Campeonato::orderBy('nome')->paginate(100);
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

    public function update(Campeonato $campeonato, Request $request){
        try{
            $data = $request->validate([
                'nome'      => 'required|string|max:255',
                'temporada' => 'required|integer',
                'tipo'      => 'required|integer',
                'qt_times' => 'required|integer'
            ]);

            $campeonato->nome = $data['nome'];
            $campeonato->temporada = $data['temporada'];
            $campeonato->tipo = $data['tipo'];
            $campeonato->qt_times = $data['qt_times'];

            $campeonato->save();

            return redirect()->route('campeonatos.index')->with('success', 'Campeonato atualizado com sucesso!');
        } catch (\Exception  $e) {
            Log::error('Erro ao atualizar campeonato: ' . $e->getMessage());
            return redirect()->route('campeonatos.index')->with('error', 'Erro ao atualizar o campeonato. Tente novamente!');
        }
    }
}
