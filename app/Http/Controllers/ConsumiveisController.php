<?php

namespace App\Http\Controllers;

use App\Models\Consumivel;
use App\Models\Funcionario;
use App\Models\Prestador;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ConsumiveisController extends Controller
{
    
    public function create()
    {
        return view('pages.pagamentodespesa');
    }

    public function store(Request $request)
    {
        Consumivel::create([
            'sede' =>$request->sede,
            'nome' =>$request->nome,
            'data' =>$request->data,
            'valor' =>$request->valor,
            'notafiscal' =>$request->notafiscal,
        ]);

            return back()->withStatus(__('Consumivel cadastrado com sucesso.'));;

    }

    public function show(){

        $funcionarios = Funcionario::all();
        $total_salario = Funcionario::sum('salario');
        $prestadores = Prestador::all();
        $consumiveis = Consumivel::all();
        $total_consumiveis = Consumivel::sum('valor');
        $fornecedores = Fornecedor::all();
        return view('pages.despesa',compact('funcionarios', 'prestadores', 'total_salario', 'consumiveis', 'total_consumiveis', 'fornecedores'));

       
    }
    
    public function dash(){
        $total_funcionario  = Funcionario::table('id')->count();
        return view('pages.despesa', compact('total_funcionario'));
    }

    public function destroy($id){
        $consumivel=Consumivel::findOrFail($id);
        $consumivel->delete();
        return back()->withStatus1(__('Consumivel excluido com sucesso.'));;
    }

}
