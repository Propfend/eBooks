@extends('layouts/base')

@section('title', 'Free eBooks')

@section('conteudo')

@push('css')
    
@endpush

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{route('site.main')}}">
      <h1>eBooks</h1>
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <!-- DropDown Do Menu-->

  
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="{{route('site.main')}}">
        Home
      </a>

      <a class="navbar-item" href="{{route('fav.favoritos')}}">
        Favoritos
      </a>

      @auth

      <a class="navbar-item" href="{{route('site.logout')}}">
        Sair
      </a>

      @else

      <a class="navbar-item" href="{{route('site.loginForm')}}">
        Entrar
      </a>

      <a class="navbar-item" href="{{route('site.registerForm')}}">
        Registrar
      </a>

      @endauth

      <!-- Adicionar/Remover -->

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Adicionar/Limpar
        </a>

      <div class="navbar-dropdown">
        <a class="navbar-item" href="{{route('lista.addForm')}}">
          Adicionar eBook
        </a>
        <a class="navbar-item" href="{{route('lista.limpar')}}">
          Limpar 
        </a>
      </div>
  
    </div>

      <a class="navbar-item" href="{{route('contato.contato')}}">
        Contato
      </a>

    </div>
</nav>  

@if ($erro = Session::get('erro'))
<div class="card">
  <div class="card-content">
    <div class="content">
      {{$erro}}
    </div>
  </div>
</div>
@endif

@if ($logado = Session::get('logado'))
<div class="card">
  <div class="card-content">
    <div class="content">
      {{$logado}}
    </div>
  </div>
</div>
@endif

@if ($errors->any())
<div class="card">
  <div class="card-content">
    <div class="content">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endif


<div class="row container" style="padding: 28px;">
  <h2 style="text-align: center">Criar conta</h2>
    <form action="{{route('site.register')}}" method="POST">
      @csrf

      <div class="field">
        <label class="label" for='firstname'>Nome</label>
        <div class="control">
          <input class="input" type='firstname' placeholder="Seu Nome" name='firstname' value="{{old('firstname')}}">
        </div>
      </div>

      <div class="field">
        <label class="label" for="lastname">Senha</label>
        <div class="control">
          <input class="input" type="lastname" placeholder="Seu Sobrenome" name="lastname" value="{{old('lastname')}}">
        </div>
      </div>
    
      <div class="field">
        <label class="label" for="email">Email</label>
        <div class="control">
          <input class="input" type="email" placeholder="Seu Email" name="email" value="{{old('email')}}">
        </div>
      </div>

      <div class="field">
        <label class="label" for="password">Senha</label>
        <div class="control">
          <input class="input" type="password" placeholder="Sua Senha" name="password" value="{{old('password')}}">
        </div>
      </div>
    
    
          <div class="" style="text-align: center;">
            <div class="control">
              <button class="button is-link">Submit</button>
            </div>
          </div>
    </form>
    <h2>Já possui conta? clique <a href="{{route('site.loginForm')}}">aqui</a> para entrar</h2>
</div>



@endsection

<script>
document.addEventListener('DOMContentLoaded', () => {
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    if ($navbarBurgers.length > 0) {
        $navbarBurgers.forEach(el => {
            el.addEventListener('click', () => {
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                el.classList.toggle('is-active');

                if ($target.classList.contains('navbar-menu')) {
                    $target.classList.toggle('is-active');
                } else {
                    // Caso seja o dropdown, fecha todos os dropdowns abertos primeiro
                    const $dropdowns = Array.prototype.slice.call(document.querySelectorAll(
                        '.navbar-item.has-dropdown'), 0);
                    $dropdowns.forEach(dropdown => {
                        if (dropdown !== $target.parentElement) {
                            dropdown.classList.remove('is-active');
                        }
                    });

                    // Abre ou fecha o dropdown atual
                    $target.parentElement.classList.toggle('is-active');
                }
            });
        });
    }
});
</script>