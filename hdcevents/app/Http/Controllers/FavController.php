<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavController extends Controller
{
    public function mostrar_favoritos(){
        $itens = \Cart::getContent();
        return view('site.favoritos', compact('itens'));
    }
    
    public function fav_adicionar(Request $request){
        \Cart::add([
            
            'name' => $request->nome,
            'id' => $request->id,
            'price' => $request->price, 
            'quantity' => $request->quantity,
            
            'attributes' => array(
                'sinopse' => $request->sinopse,
                'autor' => $request->autor,
                'slug' => $request->slug,
                'paginas' => $request->paginas,
                'lançamento' => $request->lançamento,
            ),
        ]);

        return redirect()->route('fav.favoritos')->with('msg', 'eBook Favoritado Com Sucesso!');
    }

    public function fav_remover(Request $request){
        \Cart::remove($request->id);
        return redirect()->back()->with('msg', 'eBook removido Com Sucesso!!');
    }

    public function fav_limpar(){
        \Cart::clear();

        return redirect()->back()->with('fav_limpos', 'Lista de favoritos limpa com sucesso!!');
    }

    
}