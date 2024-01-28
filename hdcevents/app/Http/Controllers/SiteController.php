<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Ebook;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function main(){
        
        $ebooks = Ebook::all();
        
        return view('site.main', ['ebooks' => $ebooks]);
    }

    public function detalhes($slug){
        
        $ebook = Ebook::where('slug', $slug)->first();
        
        return view('site.detalhes', compact('ebook'));
    }

    public function categoria($id){
        $categoria = Categoria::find($id);
        $ebooks = Ebook::where('id_categoria', $id)->paginate(10);

        return view('site.genero', compact('categoria', 'ebooks'));
    }

    public function adicionar(){
        return view('site.adicionar');
    }

}