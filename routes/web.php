<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard','DashboardController@show')->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->post('despesas', 'DespesaController@store')->name('despesas');
Route::middleware(['auth:sanctum', 'verified'])->get('despesas', 'DespesaController@despesas')->name('despesas');
Route::middleware(['auth:sanctum', 'verified'])->get('consulta-despesa', 'ConsultaDespesaController@consultaDespesa')->name('consulta-despesa');
Route::middleware(['auth:sanctum', 'verified'])->get('consulta-despesa', 'ConsultaDespesaController@show')->name('consulta-despesa');
Route::middleware(['auth:sanctum', 'verified'])->get('consulta-despesa/{id}', 'ConsultaDespesaController@destroy')->name('excluir-despesa');

Route::middleware(['auth:sanctum', 'verified'])->get('compras', 'ComprasController@compras')->name('compras');
Route::middleware(['auth:sanctum', 'verified'])->get('consulta-compras', 'ConsultaComprasController@consultaCompras')->name('consulta-compras');

Route::middleware(['auth:sanctum', 'verified'])->post('compras', 'ComprasController@store')->name('compras');
Route::middleware(['auth:sanctum', 'verified'])->get('consulta-compras', 'ConsultaComprasController@show')->name('consulta-compras');
Route::middleware(['auth:sanctum', 'verified'])->get('consulta-compras/{id}', 'ConsultaComprasController@destroy')->name('excluir-compras');

Route::middleware(['auth:sanctum', 'verified'])->get('faturamento', 'FaturamentoController@faturamento')->name('faturamento');;
Route::middleware(['auth:sanctum', 'verified'])->get('consulta-faturamento', 'ConsultaFaturamentoController@consultafaturamento')->name('consulta-faturamento');

Route::middleware(['auth:sanctum', 'verified'])->post('faturamento', 'FaturamentoController@store')->name('faturamento');
Route::middleware(['auth:sanctum', 'verified'])->get('consulta-faturamento', 'ConsultaFaturamentoController@show')->name('consulta-faturamento');
Route::middleware(['auth:sanctum', 'verified'])->get('consulta-faturamento/{id}', 'ConsultaFaturamentoController@destroy')->name('excluir');
