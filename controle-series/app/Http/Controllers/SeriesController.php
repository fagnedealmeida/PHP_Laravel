<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{
    public function listarSeries(Request $request){   

        $series = Series::all();
        $mensagem = $request->session()->get('mensagem');
        return view('series.index')->with('series', $series)->with('mensagem', $mensagem);
    }

    public function create(){
        return view('series.create');
    }

    public function store(SeriesFormRequest $request){     
        $nomeSerie = $request->nome;
        $serie = Series::create($request->all());
        $seasons = [];
        for($i=1; $i <= $request->seasonsQty; $i++ ){
            $seasons[] = [
                'series_id' => $serie->id,
                'numero' => $i,
            ];
        }
        Season::insert($seasons);
        $episodes = [];
        foreach($serie->seasons as $season){
            for($j=1; $j <= $request->episodesPerSeason; $j++ ){
                $episodes [] = [
                    'season_id' => $season->id,
                    'numero' => $j,
                ];
            }
        }
        Episode::insert( $episodes );       
        $request->session()->flash('mensagem', "Serie $nomeSerie salva com sucesso");
        return redirect('/series');
    }

    public function destroy(Request $request){
        $id = $request->id;
        $serie = Series::find($id);
        Series::destroy($id);
        $request->session()->flash('mensagem', "Serie $serie->nome excluída com sucesso");
        return redirect('/series');
    }

    public function edit(Series $serie){
        return view('series.edit')->with('serie', $serie);
    }


    public function update(Series $serie, SeriesFormRequest $request){
       $nomeAnterior = $serie->nome;
       $nomeAtual =  $request->nome;
       $serie->nome = $nomeAtual;
       $serie->save();
       $request->session()->flash('mensagem',
       "Serie '$nomeAnterior' editada com sucesso para '$nomeAtual'");
       return redirect('/series');
    }
}
