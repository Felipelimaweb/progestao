<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Consumivel;
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
            'contrato_id' => 'required',
        ]);
        Notafiscal::create([
            'nome' =>$request->nome,
            'valor' =>$request->valor,
            'data' =>$request->data,
            'confirmação' =>$request->confirmação,
            'contrato_id' => $request->contrato_id,
        ]);

            return redirect('Notas-Fiscais')->withStatus2(__('NotaFiscal cadastrada com sucesso.'));;

    }

    public function shownotafiscal(Request $request)
    {
        
        $notafiscal = Contrato::with('Cliente')->get();

        $notafiscals = Notafiscal::all(); 

        return view('pages.notafiscal', compact(
            'notafiscal',
            'notafiscals',
            ));
        
    }

    public function edit($id){
        $notafiscal = Notafiscal::findOrFail($id);


        return view('pages.edit.notafiscal', ['notafiscal' =>$notafiscal]);;

    }
    public function create($id){
        $contrato = Contrato::findOrFail($id);
        return view('pages.cadastro.notafiscal', ['contrato' =>$contrato]);;

    }

    public function update(Request $request, $id){
        //validação do cadastro
        $request->validate([
            'nome' => 'required',
            'valor' => 'required',
            'data' => 'required',
            'confirmação' => 'required',
            'contrato_id' => 'required',
        ]);
        $notafiscal = Notafiscal::findOrFail($id);
        $notafiscal->update([
            'nome' =>$request->nome,
            'valor' =>$request->valor,
            'data' =>$request->data,
            'confirmação' =>$request->confirmação,
            'contrato_id' => $request->contrato_id,
        ]);
        return back()->withStatus2(__('Nota Fiscal Atualizada com sucesso.'));;

    }

    public function shownotaspendentes(){

        $consumivels = Consumivel::all(); 
        return view('pages.pagamentodespesa', compact('consumivels'));
    }

    public function shownotasclientes(){

        $notafiscals = Notafiscal::all(); 
        return view('pages.receita', compact('notafiscals'));
    }

    public function destroy($id){
        $notafiscal=Notafiscal::findOrFail($id);
        $notafiscal->delete();
        return back()->withStatus1(__('Nota Fiscal excluida com sucesso.'));;
    }

}
