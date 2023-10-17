<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, user-scalable=no, initial-scale=1.0,
maximum-scale=1.0, user-scalable=0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{$title}}</title>
<script src="https://kit.fontawesome.com/e6996fc134.js" crossorigin="anonymous"></script><link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.cs
s" integrity="sha384-
ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-primary bg-gradient mt-3 mb-3">
            <div class="container-fluid">
                
                
                <a class="text-white" href="{{route('contatos.index')}}">
                    <i class="fa-solid fa-house"></i>Home</a>
                
                
                
                <a class="text-white" href="{{route('contatos.create')}}">
                    <i class="fa-solid fa-plus"></i>Criar Contato</a>
                
                @guest
                <a class="text-white" href="{{route('login')}}">
                <i class="fa-solid fa-person"></i>Entrar</a>
                @endguest
                @auth
                <a class="text-white" href="#">
                <i class="fa-solid fa-person"></i>Olá, {{Auth::user()->name}}</a>
               
                <a class="text-white" href="{{route('logout')}}">
                <i class="fa-solid fa-power-off"></i>Sair</a>
                @endauth

            </div>
        </nav>
    <div class="jumbotron bg-dark text-white">
        <h1 class="display-4 text-center">{{$title}}</h1>
    </div>
   

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

    {{$slot}}
    
    <div class="footer bg-primary bg-gradient mt-4">
        <p class="text-center text-white">
            IFPBAgenda &copy; - Todos os Diretos Reservados
        </p>
    </div>
    </div>     
</body>
</html>