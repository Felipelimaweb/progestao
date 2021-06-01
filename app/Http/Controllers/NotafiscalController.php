<?php

namespace App\Http\Controllers;

use App\Models\Notafiscal;
use Illuminate\Http\Request;

class NotafiscalController extends Controller
{
    
    public function store(Request $request)
    {
        Notafiscal::create([
            'nome' =>$request->nome,
            'valor' =>$request->valor,
            'confirmação' =>$request->confirmação,
        ]);

            return back()->withStatus(__('NotaFiscal cadastrada com sucesso.'));;

    }

    public function destroy($id){
        $notafiscal=Notafiscal::findOrFail($id);
        $notafiscal->delete();
        return back()->withStatus1(__('Nota Fiscal excluida com sucesso.'));;
    }

}
