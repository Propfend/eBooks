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

@if ($falha = Session::get('falha'))
<div class="card">
  <div class="card-content">
    <div class="content">
      {{$falha}}
    </div>
  </div>
</div>
@endif

@if ($alterado = Session::get('alterado'))
<div class="card">
  <div class="card-content">
    <div class="content">
      {{$alterado}}
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

<div class="container is-widescreen">
    <form action="{{route('lista.editar')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="id" value="{{$ebook->id}}">
        <div class="field">
            <label class="label" for="nome">Nome</label>
            <div class="control">
              <input class="input" type="text" placeholder="Nome" name="nome" required value="{{$ebook->nome}}">
            </div>
          </div>
    
          <div class="field">
            <label class="label" for="autor">Autor</label>
            <div class="control">
              <input class="input" type="text" placeholder="Autor" name="autor" required value="{{$ebook->autor}}">
            </div>
          </div>
  
          <div class="field">
            <label class="label" for="paginas">Páginas</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-success" type="number" placeholder="Páginas" name="paginas" required value="{{$ebook->paginas}}">
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-check"></i>
              </span>
            </div>
          </div>
  
          <div class="field">
            <label class="label" for="lançamento">Lançamento</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-success" type="date" placeholder="Lançamento" name="lançamento" required value="{{$ebook->lançamento}}">
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-check"></i>
              </span>
            </div>
          </div>
  
          <div class="field">
            <label class="label" for="categoria">Gênero</label>
            <div class="control">
              <div class="select">  
                <select name="categoria" required>
                  <option value="" disabled selected >Selecione Um Gênero</option>
                  @foreach ($categorias as $categoria)
                      <option>{{$categoria->nome}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
  
          
          <div class="field">
            <label class="label" for="sinopse">Sinopse</label>
            <div class="control">
              <textarea class="textarea" placeholder="Sinopse" name="sinopse" required>{{$ebook->sinopse}}</textarea>
            </div>
          </div>
    
          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link">Alterar</button>
            </div>
          </div>
    </form>
  </div>

@endsection