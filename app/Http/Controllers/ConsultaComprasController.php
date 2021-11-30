<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaComprasController extends Controller
{
    public function consultaCompras()
    {
        return view('consulta-compras');
    }
}
