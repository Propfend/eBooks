<?php

namespace App\Livewire;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Ebook;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Str;

class Counter extends Component
{   
            
    #[Rule('required|max:120')]
    public $nome = '';

    #[Rule('required|max:120')]
    public $autor = '';

    #[Rule('required|max:4')]
    public $paginas = '';

    #[Rule('required')]
    public $categoria = '';

    #[Rule('required')]
    public $lançamento = '';

    #[Rule('required|max:250')]
    public $sinopse = '';
    
    public function render()
    {
        return view('livewire.counter');
    }

    public function store(){

        $autor = new Autor();

        $ebook = new Ebook();
        
        $validated = $this->validate();
        
        $nome = $validated['nome'];

        $categoria = $validated['categoria'];

        $id_categoria = Categoria::where('nome', $categoria)->first()->id;
        
        $created = $ebook->create([
            'slug' => Str::slug($nome),
            'nome' => $nome,
            'sinopse' => $validated['sinopse'],
            'autor' => $validated['autor'],
            'lançamento' => $validated['lançamento'],
            'paginas' => $validated['paginas'],
            'id_categoria' => $id_categoria,
            'id_user' => User::pluck('id')->random(),
        ]);

        $create = $autor->create([
            'nome' => $validated['autor'],
            'livros' => 1,
        ]);
        
        if($created){
            if($create){
            return redirect()->back()->with('msg', 'eBook Adicionado Com Sucesso');
            }else{
                return redirect()->back()->with('msg', 'eBook Não pôde ser Adicionado');
            }
        }else{
            return redirect()->back()->with('msg', 'eBook Não pôde ser Adicionado');
        }
    }
}