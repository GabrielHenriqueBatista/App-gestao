<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaFaturamentoController extends Controller
{
    public function consultafaturamento()
    {
       return view('consulta-faturamento');
    }
}
