<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Ebook;
use Livewire\Component;
use Livewire\WithPagination;

class SearchEbooks extends Component
{
    use WithPagination;
    
    public $search = '';

    public function render()
    {
        $id_categoria = Categoria::select('id')->where('nome', $this->search);
        $ebooks = Ebook::where('nome', 'like', '%'.$this->search.'%')->
        Orwhere('autor', 'like', '%'.$this->search.'%')->
        Orwhere('nome', 'like', '%'.$this->search.'%')->
        Orwhere('id_categoria', $id_categoria)
        ->paginate(12);

        return view('livewire.search-ebooks', ['ebooks' => $ebooks]);
    }
}