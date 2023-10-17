<x-layout title="Login">
    <form method="post" action="{{route('signin')}}">
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button class="btn btn-primary">
            Entrar
        </button>
        <a href="{{route('users.create')}}" class="btn btn-primary">Registrar</a>
    </form>
</x-layout>