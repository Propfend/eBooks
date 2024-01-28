<div>


@if ($msg = Session::get('msg'))
<div class="card">
  <div class="card-content">
    <div class="content">
      {{$msg}}
    </div>
  </div>
</div>
@endif


<div class="container is-widescreen">
  <form action="" method="POST" enctype="multipart/form-data" wire:submit='store'>
    @csrf
      <div class="field">
          <label class="label" for="nome">Nome</label>
          <div class="control">
            <input class="input" type="text" placeholder="Nome" name="nome" value="{{old('nome')}}" wire:model.live.debounce.500ms='nome'>
            
            @error('nome')
            <span class="icon-text has-text-danger">
              <span>{{$message}}</span>
            </span>
            @enderror
          </div>
        </div>
  
        <div class="field">
          <label class="label" for="autor">Autor</label>
          <div class="control">
            <input class="input" type="text" placeholder="Autor" name="autor" value="{{old('autor')}}" wire:model.live.debounce.500ms='autor'>
            
            @error('autor')
            <span class="icon-text has-text-danger">
              <span>{{$message}}</span>
            </span>
            @enderror
          </div>
        </div>

        <div class="field">
          <label class="label" for="paginas">Páginas</label>
          <div class="control has-icons-left has-icons-right">
            <input class="input is-success" type="number" placeholder="Páginas" name="paginas" value="{{old('paginas')}}" wire:model.live.debounce.500ms='paginas'>
            
            @error('paginas')
            <span class="icon-text has-text-danger">
              <span>{{$message}}</span>
            </span>
            @enderror
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
            <input class="input is-success" type="date" placeholder="Lançamento" name="lançamento" value="{{old('lançamento')}}" wire:model.live.debounce.500ms='lançamento'>
            @error('lançamento')
            <span class="icon-text has-text-danger">
              <span>{{$message}}</span>
            </span>
            @enderror
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
              <select name="categoria" wire:model.live.debounce.500ms='categoria'>
                <option>Selecione Um Gênero</option>
                @foreach ($categorias as $categoria)
                    <option  >{{$categoria->nome}}</option>
                @endforeach
              </select>
            </div>
            
          </div>
          @error('categoria')
              <span class="icon-text has-text-danger">
                <span>{{$message}}</span>
              </span>
              @enderror
        </div>

        
        <div class="field">
          <label class="label" for="sinopse">Sinopse</label>
          <div class="control">
            <textarea class="textarea" placeholder="Sinopse" name="sinopse" wire:model.live.debounce.500ms='sinopse' >{{old('sinopse')}}</textarea>
            @error('sinopse')
            <span class="icon-text has-text-danger">
              <span>{{$message}}</span>
            </span>
            @enderror
          </div>
          </div>
        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link">Adicionar</button>
          </div>
        </div>
    </div>
  </form>
</div>
</div>
