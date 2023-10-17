
<x-layout title="Lista de Series">
    @if(!empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}        
    </div>
    @endif

    @if ($errors->any())
        
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <a href="/series/criar">
        <button class="btn btn-primary mb-4">Adicionar</button>
    </a>
    <ul class="list-group ">
        @foreach($series as $serie)
        <li class="list-group-item justify-content-between align-items-center d-flex"> 
            <a href="{{ route('seasons.index', $serie->id) }}">
                {{$serie->nome}}
            </a>
            <span class="d-flex">
                <a href="{{route('series.edit', $serie->id)}}">
                    <button class="btn btn-primary mr-2">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </a>
                <form method="post" action="/series/remover/{{$serie->id}}">
                    @csrf
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </span>
        </li>
       @endforeach
    </ul> 
</x-layout>
    
  