<x-layout title="Adicionar Contato">
    <form action="{{ route('contatos.store') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" placeholder="Digite seu nome" name="nome" id="nome" class="form-control">
            </div>
            <div class="form-row " >
                <div class="form-group col-md-6">
                <label for="telefone" class="mt-2">Telefone:</label>
                <input type="text" name="telefone" id="telefone" required class="form-control" placeholder="(dd)xxxx-xxxx">
                </div>
                <div class="form-group col-md-6">
                <label for="numero1" class="mt-2">Telefone (opcional):</label>
                <input type="text" name="numero1" placeholder="(dd)xxxx-xxxx" id="numero1" class="form-control">
                </div>
            </div>
            <div class="form-group ">
            <label for="email">Email:</label>
            <input type="email" placeholder="example@example.com" name="email" id="email" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
    