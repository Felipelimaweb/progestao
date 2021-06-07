<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use App\Models\Prestador;
use Illuminate\Http\Request;

class ContratosController extends Controller
{

    public function store(Request $request)
    {
        //validação do cadastro
        $request->validate([
            'nome' => 'required',
            'data' => 'required',
        ]);

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

    public function show123()
    {
        
        $contrato = Contrato::with('Cliente')->get();
        $clientes = Cliente::with('Contrato')->get();
        
        $clientestabela = Cliente::all();
        $contratotabela = Contrato::all();
        $fornecedortabela = Fornecedor::all();
        $funcionariotabela = Funcionario::all();
        $prestadortabela = Prestador::all();
        return view('pages.cadastro.register', compact('clientes', 'contrato','clientestabela', 'fornecedortabela', 'funcionariotabela', 'prestadortabela','contratotabela'));
        
    }

   

    public function show()
    {

        $clientestabela = Cliente::all();
        $fornecedortabela = Fornecedor::all();
        $funcionariotabela = Funcionario::all();
        $prestadortabela = Prestador::all();
        return view('pages.contrato', compact('clientestabela', 'fornecedortabela', 'funcionariotabela', 'prestadortabela'));
    }

    public function destroy($id)
    {
        $contrato = Contrato::findOrFail($id);
        $contrato->delete();
        return back()->withStatus1(__('Contrato excluido com sucesso.'));;
    }
}
