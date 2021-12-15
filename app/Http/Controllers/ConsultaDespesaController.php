<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Despesas;

class ConsultaDespesaController extends Controller
{
    public function consultaDespesa()
    {
        return view('consulta-despesa');
    }
   
    public function show(){
        $despesas = Despesas::all();
        return view('consulta-despesa',['despesas' => $despesas]);
    }
    public function destroy($id){
        $despesa = Despesas::findOrFail($id);
        $despesa->delete();
        return redirect('consulta-despesa');
    }
}
  

