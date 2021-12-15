<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesas;
use App\Models\Faturamentos;
use App\Models\Compras;

class DashboardController extends Controller
{
    public function despesas()
    {
        return view('dashboard');
    }
    public function show(){
        $despesas = Despesas::all();
        $compras = Compras::all();
        $faturamentos = Faturamentos::all();
        return view('dashboard',[
            'despesas' => $despesas,
            'compras' => $compras,
            'faturamentos' => $faturamentos,
        ]);
    }
    
    
    
        
}
