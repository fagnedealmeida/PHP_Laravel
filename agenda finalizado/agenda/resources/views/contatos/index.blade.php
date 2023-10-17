
<x-layout title="Lista de Contatos">
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
    @auth
    <a href="/contatos/criar">
        <button class="btn btn-primary mb-4">
        <i class="fa-solid fa-plus"></i>Adicionar</button>
    </a>
    @endauth
    <ul class="list-group ">
        @foreach($contatos as $contato)
        <li class="list-group-item justify-content-between align-items-center d-flex"> 
            <div>
            <i class="fa-regular fa-user"></i>
            <span>{{$contato->nome}}</span>
            </div>
           
            
            @if(empty($contato->numero1))
                <div>
                <i class="fa-solid fa-phone"></i>
                <span>{{$contato->telefones[0]->numero}}</span>
                </div>
            @elseif(!empty($contato->numero1))
                <div>
                <i class="fa-solid fa-phone"></i>
                <span>{{$contato->telefones[0]->numero}} - {{$contato->numero1}}</span>
                
                </div>

            @endif
            <div>
            <i class="fa-solid fa-at"></i>
            <span>{{$contato->email}}</span>
            </div>
            @auth
            <span class="d-flex">
                <a href="{{route('contatos.edit', $contato->id)}}">
                    <button class="btn btn-primary mr-2">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </a>
                <form method="post" action="contatos/remover/{{$contato->id}}">
                    @csrf
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </span>
            @endauth                        
        </li>
       @endforeach
    </ul> 
</x-layout>
    
  