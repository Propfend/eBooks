<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListaController extends Controller
{
    public readonly Ebook $ebook;

    public readonly Autor $autor;
    
    public readonly Categoria $categoria;

    public function __construct()
    {
        $this->ebook = new Ebook;

        $this->autor = new Autor;

        $this->categoria = new Categoria;
    }

    public function add_form(){
        return view('crud.adicionar');
    }
    
    public function adicionar_ebook(Request $request){
        
        
    }   

    public function limpar_ebooks(){
        $this->ebook->truncate();
        
        return redirect()->route('site.main')->with('limpa', 'Lista Limpa Com Sucesso!!');
    }

    public function edit_form(Ebook $ebook){
        return view('crud.editar', compact('ebook'));
    }

    public function editar_ebooks(Request $request){

        $validated = $this->validate($request, [
            'nome' => 'required|max:80',
            'sinopse' => 'required|max:250',
            'lançamento' => 'required',
            'autor' => 'required|max:65',
            'paginas' => 'required|max:4',
            'categoria' => 'required',
        ]);

        $id_categoria = Categoria::where('nome', $request->categoria)->first()->id;
        
        $updated = $this->ebook->where('id', $request->id)->update([
            'nome' => $request->nome,
            'slug' => Str::slug($request->nome),
            'autor' => $request->autor,
            'lançamento' => $request->lançamento,
            'paginas' => $request->paginas,
            'sinopse' => $request->sinopse,
            'id_categoria' => $id_categoria,
        ]);
        if(!$updated){
            return redirect()->route('site.main')->with('falha', 'Falha ao alterar eBook');
        }
        
        return redirect()->route('site.main')->with('alterado', 'eBook alterado com sucesso!');
        
    }

    public function deletar_ebooks(Request $request){
        $deletado = $this->ebook->where('id', $request->id)->delete();

        if(!$deletado){
            return redirect()->route('site.main')->with('deletado', 'Falha ao deletar eBook!');
        }
        
        return redirect()->route('site.main')->with('deletado', 'eBook deletado com sucesso!');
    }
    
}