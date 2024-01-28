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


@endsection