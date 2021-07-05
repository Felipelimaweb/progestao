<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Contrato;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    
    public function create()
    {
        return view('pages.cadastro.registerfornecedor');
    }

    public function store(Request $request)
    {
        //validação do cadastro
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required',
        ]);
        Fornecedor::create([
            'sede' =>$request->sede,
            'nome' =>$request->nome,
            'cnpj' =>$request->cnpj,
        ]);

            return back()->withStatus(__('Fornecedor cadastrado com sucesso.'));;

    }

    public function show(){

        $fornecedores = Fornecedor::all();
        return view('pages.cadastro.registerfornecedor', ['fornecedores' => $fornecedores]);

    }

    public function edit($id){
        $fornecedor = Fornecedor::findOrFail($id);

        return view('pages.edit.fornecedor', ['fornecedor' =>$fornecedor]);;

    }
    public function include($id){

        
        $fornecedor = Fornecedor::findOrFail($id);
        
        return view('pages.cadastro.contratofornecedor', ['fornecedor' =>$fornecedor]);;

    }

    public function storefornecedor(Request $request)
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
            'fornecedor_id' => $request->fornecedor_id,
        ]);

        return back()->withStatus(__('Contrato cadastrado com sucesso.'));;
    }

    public function update(Request $request, $id){
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update([
            'sede' =>$request->sede,
            'nome' =>$request->nome,
            'cnpj' =>$request->cnpj,
        ]);
        return back()->withStatus2(__('Fornecedor Atualizado com sucesso.'));;

    }

    public function destroy($id){
        $fornecedor=Fornecedor::findOrFail($id);
        $fornecedor->delete();
        return back()->withStatus1(__('Fornecedor excluido com sucesso.'));;
    }

}
