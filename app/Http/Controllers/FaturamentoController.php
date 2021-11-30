<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faturamentos;

class FaturamentoController extends Controller
{
    public function faturamento()
    {
       return view('faturamento');
    }
    public function store(Request $request) {
        Faturamentos::create([
            'ano' => $request->ano,
            'mes' => $request->mes,
            'dia' => $request->dia,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ]);
        return view('faturamento');
    }
}
