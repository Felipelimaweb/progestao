<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ClientesController extends Controller
{
    public function create()
    {
        return view('pages.cadastro.registercliente');
    }

    public function store(Request $request)
    {
        //validação do cadastro
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required',
        ]);
        Cliente::create([
            'sede' =>$request->sede,
            'nome' =>$request->nome,
            'cnpj' =>$request->cnpj,
        ]);

            return back()->withStatus(__('Cliente cadastrado com sucesso.'));;

    }

    public function show(){

        $clientes = Cliente::all();
        return view('pages.cadastro.registercliente', ['clientes' => $clientes]);

    }

    public function show1(){

        $clientes = Cliente::all();
        return view('pages.receita', ['clientes' => $clientes]);

    }
    
    public function destroy($id){
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        return back()->withStatus1(__('Cliente excluido com sucesso.'));;
    }

}
