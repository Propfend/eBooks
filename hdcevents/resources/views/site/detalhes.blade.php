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
  <h2 style="text-align: center">Favoritos</h2>
    <div class="responsive-img">
        <p>{{$ebook->sinopse}}</p>
    </div>
    <div>
        <h4>{{$ebook->nome}}</h4  >
    </div>
</div>

<div class="container">
  <div >

    <form action="{{route('fav.favoritar')}}" method="post">
      @csrf
  
      <input type="hidden" name="price" value="1">
      <input type="hidden" name="quantity" value="1">
      <input type="hidden" name="nome" value="{{$ebook->nome}}">
      <input type="hidden" name="autor" value="{{$ebook->autor}}">
      <input type="hidden" name="sinopse" value="{{$ebook->sinopse}}">
      <input type="hidden" name="paginas" value="{{$ebook->paginas}}">
      <input type="hidden" name="id" value="{{$ebook->id}}">
      <input type="hidden" name="slug" value="{{$ebook->slug}}">
      <input type="hidden" name="lançamento" value="{{$ebook->lançamento}}">
  
      <div style="text-align: center"><button type="submit" class="button">Favoritar</button></div>
    </form>
  
    <a class="button" href="{{route('lista.editForm', $ebook)}}">Editar</a>
  
  
    <form action="{{route('lista.delete')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$ebook->id}}">
      <div style="text-align: center"><button type="submit" class="button">Deletar</button></div>
    </form>

  </div>
</div>

<br><br>

<h2 class="buttton" style="text-align: center">Gêneros</h2><br>

<div class="container">
  @foreach ($categorias as $categoria)
      <a class="button" href="{{route('site.categoria', $categoria->id)}}">{{$categoria->nome}}</a>
  @endforeach
</div>

<script>
  document.addEventListener('DOMContentLoaded', function(){

    var drop = document.querySelectorAll('.dropdown-trigger');
    M.Dropdown.init(drop) 
  })
</script>

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