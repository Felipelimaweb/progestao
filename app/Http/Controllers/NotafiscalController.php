<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Fornecedor;
use App\Models\Funcionario;
use App\Models\Prestador;
use App\Models\Notafiscal;
use Illuminate\Http\Request;

class NotafiscalController extends Controller
{
    
    public function store(Request $request)
    {
        //validação do cadastro
        $request->validate([
            'nome' => 'required',
            'valor' => 'required',
            'data' => 'required',
            'confirmação' => 'required',
        ]);
        Notafiscal::create([
            'nome' =>$request->nome,
            'valor' =>$request->valor,
            'data' =>$request->data,
            'confirmação' =>$request->confirmação,
            'contrato_id' => $request->contrato_id,
        ]);

            return back()->withStatus(__('NotaFiscal cadastrada com sucesso.'));;

    }

    public function show123(Request $request)
    {
        
        $contratocliente = Contrato::find($request->get('id'));
        $contratofornecedor = Contrato::find($request->get('id'));
        $contratofuncionario = Contrato::find($request->get('id'));
        $contratoprestador = Contrato::find($request->get('id'));
                
        $clientestabela = Cliente::all();
        $contratotabela = Contrato::all();
        $fornecedortabela = Fornecedor::all();
        $funcionariotabela = Funcionario::all();
        $prestadortabela = Prestador::all();
        return view('pages.notafiscal', compact(
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

    public function destroy($id){
        $notafiscal=Notafiscal::findOrFail($id);
        $notafiscal->delete();
        return back()->withStatus1(__('Nota Fiscal excluida com sucesso.'));;
    }

}
