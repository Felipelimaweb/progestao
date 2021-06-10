<?php

namespace App\Http\Controllers;

use App\Models\Consumivel;
use App\Models\Funcionario;
use App\Models\Prestador;
use App\Models\Fornecedor;
use App\Models\Contrato;
use App\Models\Notafiscal;
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

        $contratos = Contrato::with('Cliente')->get();
        $notafiscals = Notafiscal::all();
        
        $funcionarios = Funcionario::all();
        $prestadores = Prestador::all();
        $consumiveis = Consumivel::all();
        $fornecedores = Fornecedor::all();

        return view('pages.despesa',compact('contratos', 'notafiscals', 'funcionarios', 'prestadores', 'consumiveis', 'fornecedores'));

       
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
