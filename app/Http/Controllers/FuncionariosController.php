<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{
    public function store(Request $request)
    {
        //validação do cadastro
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'cargo' => 'required',
            'salario' => 'required',
        ]);
        Funcionario::create([
            'sede' =>$request->sede,
            'nome' =>$request->nome,
            'cpf' =>$request->cpf,
            'email' =>$request->email,
            'telefone' =>$request->telefone,
            'cargo' =>$request->cargo,
            'salario' =>$request->salario,
        ]);

            return back()->withStatus(__('Funcionario cadastrado com sucesso.'));;

    }

    public function show(){

        $funcionario = Funcionario::all();
        return view('pages.cadastro.registerfuncionario', ['funcionarios' => $funcionario]);

    }

    public function destroy($id){
        $funcionario=Funcionario::findOrFail($id);
        $funcionario->delete();
        return back()->withStatus1(__('Funcionario excluido com sucesso.'));;
    }
}
