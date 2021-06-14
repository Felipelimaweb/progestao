<?php

namespace App\Http\Controllers;

use App\Models\Consumivel;
use App\Models\Funcionario;
use App\Models\Prestador;
use App\Models\Fornecedor;
use App\Models\Contrato;
use App\Models\Notafiscal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // somar o valor do cadastro quando a nota fiscal tiver o cadastro        
        $somanotaprestador = Notafiscal::join('contratos', 'contratos.id', '=', 'notafiscals.contrato_id')->whereNotNull('contratos.prestador_id');
        $somanotafuncionario = Notafiscal::join('contratos', 'contratos.id', '=', 'notafiscals.contrato_id')->whereNotNull('contratos.funcionario_id');
        $somanotafornecedor = Notafiscal::join('contratos', 'contratos.id', '=', 'notafiscals.contrato_id')->whereNotNull('contratos.fornecedor_id');    
        $total_prestador = $somanotaprestador->sum('notafiscals.valor');
        $total_funcionario = $somanotafuncionario->sum('notafiscals.valor');
        $total_fornecedor = $somanotafornecedor->sum('notafiscals.valor');
        $funcionarios = Funcionario::all();
        $prestadores = Prestador::all();
        $consumiveis = Consumivel::all();
        $fornecedores = Fornecedor::all();

        return view('pages.despesa',compact('contratos', 'total_prestador', 'total_funcionario', 'total_fornecedor', 'notafiscals', 'funcionarios', 'prestadores', 'consumiveis', 'fornecedores'));

       
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
