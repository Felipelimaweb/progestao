<?php

namespace App\Http\Controllers;

use App\Models\Prestador;
use Illuminate\Http\Request;

class PrestadoresController extends Controller
{
    

    public function store(Request $request)
    {
        //validação do cadastro
        $request->validate([
            'nome' => 'required',
            'cnpj' => 'required',
        ]);
        Prestador::create([
            'sede' =>$request->sede,
            'nome' =>$request->nome,
            'cnpj' =>$request->cnpj,
        ]);

            return back()->withStatus(__('Prestador cadastrado com sucesso.'));;

    }

    public function show(){

        $prestadores = Prestador::all();
        return view('pages.cadastro.registerprestador', ['prestadores' => $prestadores]);

    }

  

    public function destroy($id){
        $prestador=Prestador::findOrFail($id);
        $prestador->delete();
        return back()->withStatus1(__('Prestador excluido com sucesso.'));;
    }

}
