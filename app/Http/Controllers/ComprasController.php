<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Compras;
class ComprasController extends Controller
{
    public function compras()
    {
        return view('compras');
    }
    public function store(Request $request) {
        $request->validate([
            'ano' => 'required',
            'mes' => 'required',
            'dia' => 'numeric',
            'tipo' => 'required',
            'descricao' => 'required',
            'valor' => 'numeric',
        ]);
        Compras::create([
            'ano' => $request->ano,
            'mes' => $request->mes,
            'dia' => $request->dia,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'valor' => $request->valor,
        ]);
        return view('compras');
    }
}
?>