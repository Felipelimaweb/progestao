<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    
    public function create()
    {
        return view('pages.cadastro.registerfornecedor');
    }

    public function store(Request $request)
    {
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

    public function destroy($id){
        $fornecedor=Fornecedor::findOrFail($id);
        $fornecedor->delete();
        return back()->withStatus1(__('Fornecedor excluido com sucesso.'));;
    }

}