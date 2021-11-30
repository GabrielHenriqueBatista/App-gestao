<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas;

class DespesaController extends Controller
{
    public function despesas()
    {
        return view('despesa');
    }
    public function store(Request $request) {
        Despesas::create([
            'ano' => $request->ano,
            'mes' => $request->mes,
            'dia' => $request->dia,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ]);
        return view('despesa');
    }
}
