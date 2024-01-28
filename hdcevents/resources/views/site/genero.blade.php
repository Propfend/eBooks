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

  

<div class="row container">
  <h2 style="text-align: center">Gênero: {{$categoria->nome}}</h2>
    
  @foreach ($ebooks as $ebook)
  
  <a href="{{route('site.detalhes', $ebook->slug)}}">
    <div class="card">
    <div class="card-content">
      <div class="media">
        <div class="media-content">
          <p class="title is-4">{{$ebook->nome}}</p>
          <a href="">
            <p class="title is-5">{{$ebook->autor}}</p>
          </a>
        </div>
      </div>
  </a>

    <div class="content">
      {{$ebook->sinopse}}
      <br>
    </div>
  </div>
  </div>

  @endforeach

</div>

<br><br>

<h2 class="buttton" style="text-align: center">Gêneros</h2><br>

<div class="container">
  @foreach ($categorias as $categoria)
      <a class="button" href="{{route('site.categoria', $categoria->id)}}">{{$categoria->nome}}</a>
  @endforeach
</div>


@endsection

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    if ($navbarBurgers.length > 0) {
      $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {
          const target = el.dataset.target;
          const $target = document.getElementById(target);

          el.classList.toggle('is-active');

          if ($target.classList.contains('navbar-menu')) {
            $target.classList.toggle('is-active');
          } else {
            // Caso seja o dropdown, fecha todos os dropdowns abertos primeiro
            const $dropdowns = Array.prototype.slice.call(document.querySelectorAll('.navbar-item.has-dropdown'), 0);
            $dropdowns.forEach( dropdown => {
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
