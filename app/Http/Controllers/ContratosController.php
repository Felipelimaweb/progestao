<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use App\Models\Prestador;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;

class ContratosController extends Controller
{

    public function store(Request $request)
    {
        //validação do cadastro
        $request->validate([
            'nome' => 'required',
            'datainicial' => 'required',
            'tipo' => 'required',
            'objeto' => 'required',
            'ciclo' => 'required',
            'valor' => 'required',
        ]);

        Contrato::create([
            'nome' => $request->nome,
            'datainicial' => $request->datainicial,
            'datafinal' => $request->datafinal,
            'tipo' => $request->tipo,
            'objeto' => $request->objeto,
            'ciclo' => $request->ciclo,
            'valor' => $request->valor,
            'cliente_id' => $request->cliente_id,
            'prestador_id' => $request->prestador_id,
            'fornecedor_id' => $request->fornecedor_id,
            'funcionario_id' => $request->funcionario_id,
        ]);

        return back()->withStatus(__('Contrato cadastrado com sucesso.'));;
    }

    public function show()
    {

        $clientestabela = Cliente::all();
        $fornecedortabela = Fornecedor::all();
        $funcionariotabela = Funcionario::all();
        $prestadortabela = Prestador::all();
        return view('pages.contrato', compact('clientestabela', 'fornecedortabela', 'funcionariotabela', 'prestadortabela'));
    }

    public function show123()
    {
        
        $contratocliente = Contrato::with('Cliente')->get();
        $contratofornecedor = Contrato::with('Cliente')->get();
        $contratofuncionario = Contrato::with('Cliente')->get();
        $contratoprestador = Contrato::with('Cliente')->get();
                
        $clientestabela = Cliente::all();
        $contratotabela = Contrato::all();
        $fornecedortabela = Fornecedor::all();
        $funcionariotabela = Funcionario::all();
        $prestadortabela = Prestador::all();
        return view('pages.cadastro.register', compact(
            'contratocliente',
            'contratofornecedor',
            'contratofuncionario',
            'contratoprestador',
            'clientestabela',
            'fornecedortabela',
            'funcionariotabela',
            'prestadortabela',
            'contratotabela'));
        
    }

    public function edit($id){
        $contrato = Contrato::findOrFail($id);

        return view('pages.edit.contrato', ['contrato' =>$contrato]);;

    }

    public function update(Request $request, $id){
        //validação do cadastro
        $request->validate([
            'nome' => 'required',
            'datainicial' => 'required',
            'tipo' => 'required',
            'objeto' => 'required',
            'ciclo' => 'required',
            'valor' => 'required',
        ]);
        $contrato = Contrato::findOrFail($id);
        $contrato->update([
            'nome' => $request->nome,
            'datainicial' => $request->datainicial,
            'datafinal' => $request->datafinal,
            'tipo' => $request->tipo,
            'objeto' => $request->objeto,
            'ciclo' => $request->ciclo,
            'valor' => $request->valor,
            'cliente_id' => $request->cliente_id,
            'prestador_id' => $request->prestador_id,
            'fornecedor_id' => $request->fornecedor_id,
            'funcionario_id' => $request->funcionario_id,
        ]);
        return back()->withStatus2(__('Contrato Atualizado com sucesso.'));;

    }

    public function destroy($id)
    {
        $contrato = Contrato::findOrFail($id);
        $contrato->delete();
        return back()->withStatus1(__('Contrato excluido com sucesso.'));;
    }
}
