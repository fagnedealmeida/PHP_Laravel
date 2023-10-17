<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\Telefone;

class ContatosController extends Controller
{    
    public function listarContatos(Request $request){ 
        $contatos = Contato::all();
        #dd($contatos);      
        $mensagem = $request->session()->get('mensagem');
        return view('contatos.index')->with('contatos', $contatos)->with('mensagem', $mensagem);
    }
    
    public function create(){
        return view('contatos.create');
    }

    public function store(Request $request){
       //Salvando Contato
        $nomeContato = $request->nome;
        $emailContato = $request->email;
        $numero1Contato = $request->numero1;

        $contato = new Contato();
        $contato->nome = $nomeContato;
        $contato->email = $emailContato;
        $contato->numero1 = $numero1Contato;
        $contato->save();
        
        //salvando telefone
        $id_contato =  $contato->id;
        $telefone = new Telefone();
        $telefone->numero =  $request->telefone;
        $telefone->contatos_id = $id_contato;
        $telefone->save();

        $request->session()->flash('mensagem', "Contato $nomeContato salvo com sucesso");
        return redirect('/contatos');
    }

    public function edit(Contato $contato){
        return view('contatos.edit')->with('contato', $contato);
    }

    public function update(Contato $contato, Telefone $telefone, Request $request){
        $nomeAnterior = $contato->nome;
        $nomeNovo = $request->nome;

        $emailAntigo = $contato->email;
        $emailNovo = $request->email;

        $telefone2Antigo = $contato->numero1;
        $telefone2Novo = $request->numero1;

        $telefoneAnterior = $contato->telefones[0]->numero;
        $telefoneNovo = $request->telefone;

        $contato->nome = $nomeNovo;
        $contato->email = $emailNovo;
        $contato->numero1 = $telefone2Novo;

        $telefone = new Telefone();

        $telefone = $contato->telefones[0];
        $telefone->numero =  $telefoneNovo;
        
        $telefone->save();
        $contato->save();
        $request->session()->flash('mensagem', 
            "Contato '$nomeAnterior' atualizado '$nomeNovo' com sucesso");
        return redirect('/contatos');
    }

    public function destroy(Request $request){
        $id = $request->id;
        $contato = Contato::find($id);
        Contato::destroy($id);
        $request->session()->flash('mensagem', 
            "Contato '$contato->nome' removido com sucesso");
        return redirect('/contatos');
    }
}
