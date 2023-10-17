<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telefone;
use App\Models\Contato;

class TelefonesController extends Controller
{
    public function index(Contato $contato){
        $telefones = $contatos->contatos()->post();
        return view('contatos.index')->with('contatos', $contatos)->with('contatos',$contatos );
    }
}
