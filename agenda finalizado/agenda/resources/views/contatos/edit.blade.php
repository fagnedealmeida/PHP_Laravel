<x-layout title="Editar Contato">
    <form method="post" 
        action="{{route('contatos.update', $contato->id)}}">
        @csrf
        <div class="form-group">
            <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" value="{{$contato->nome}}" name="nome" id="nome" class="form-control">
            </div>
            <div class="form-row " >
                <div class="form-group col-md-6">
                <label for="telefone" class="mt-2">Telefone:</label>
                <input type="text" value="{{$contato->telefones[0]->numero}}" name="telefone" id="telefone" required class="form-control">
                </div>
                <div class="form-group col-md-6">
                <label for="numero1" class="mt-2">Telefone 2:</label>
                <input type="text" value="{{$contato->numero1}}" name="numero1" id="numero1" class="form-control">
                </div>
            </div>
            <div class="form-group ">
            <label for="email">Email:</label>
            <input type="email" value="{{$contato->email}}" name="email" id="email" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary">Atualizar</button>
    </form>
</x-layout>