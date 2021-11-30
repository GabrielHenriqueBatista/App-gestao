<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaturamentoController extends Controller
{
    public function faturamento()
    {
       return view('faturamento');
    }
}
