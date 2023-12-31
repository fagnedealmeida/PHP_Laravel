<x-layout title="Criar Usuário">
    <form method="post" action="{{route('users.store')}}">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button class="btn btn-primary">
            Registrar
        </button>
    </form>
</x-layout>