<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;

class ConsultaComprasController extends Controller
{
    public function consultaCompras()
    {
        return view('consulta-compras');
    }
    public function show(){
        $compras = Compras::all();
        return view('consulta-compras',['compras' => $compras]);
    }
    public function destroy($id){
        $compra = Compras::findOrFail($id);
        $compra->delete();
        return redirect('consulta-compras');
    }
    
}
