<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Fornecedor;
use DB;
use Illuminate\Http\Request;

class ContratosController extends Controller
{

    public function store(Request $request)
    {
        Contrato::create([
            'nome' => $request->nome,
            'data' => $request->data,
            'tipo' => $request->tipo,
            'objeto' => $request->objeto,
            'ciclo' => $request->ciclo,
            'valor' => $request->valor
        ]);

        return back()->withStatus(__('Contrato cadastrado com sucesso.'));;
    }

    public function show(){

        $clientes = (new \App\Models\Cliente())->getTable();
        $fornecedores = (new \App\Models\Fornecedor)->getTable();
        $funcionarios = (new \App\Models\Funcionario())->getTable();
        $prestadores = (new \App\Models\Prestador())->getTable();
        $clientestabela = Cliente::all();
        return view('pages.contrato', compact('clientes', 'fornecedores', 'funcionarios', 'prestadores','clientestabela'));
       
    }

    public function cliente(){

        

    }

    public function destroy($id)
    {
        $contrato = Contrato::findOrFail($id);
        $contrato->delete();
        return back()->withStatus1(__('Contrato excluido com sucesso.'));;
    }
}
