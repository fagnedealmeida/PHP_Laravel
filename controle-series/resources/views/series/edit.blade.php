<x-layout title="Editar Série">
    
<form method="post" action="{{route('series.update', $serie->id)}}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{$serie->nome}}" class="form-control">
        </div>
        <button class="btn btn-primary">Atualizar</button>
    </form>
</x-layout>
    