<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faturamentos;
class ConsultaFaturamentoController extends Controller
{
    public function consultafaturamento()
    {
       return view('consulta-faturamento');
    }
    public function show(){
        $faturamentos = Faturamentos::all();
        return view('consulta-faturamento',['faturamentos' => $faturamentos]);
    }
    public function destroy($id){
        $faturamento = Faturamentos::findOrFail($id);
        $faturamento->delete();
        return redirect('consulta-faturamento');
    }
}
