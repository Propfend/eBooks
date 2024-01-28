<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function contato_form(){
        return view('site.contato');
    }

    public function enviar_mensagem(Request $request){
        
        // $validated = Validator::make($request->all(), [
        //     'nome' => 'required',
        //     'sobrenome' => 'required',
        //     'email' => 'required',
        //     'assunto' => 'required',
        //     'mensagem' => 'required',
        // ]);

        // if($validated->fails()){
        //     return redirect()->back()->withErrors($validated)->withInput();
        // }

        $validated = $this->validate($request, [
            'nome' => 'required',
            'sobrenome' => 'required',
            'email' => 'required',
            'assunto' => 'required',
            'mensagem' => 'required',
        ]);

        Mail::to('mellomello2030@gmail.com', 'Luiz')->send(new Contact([
            'fromName' => $validated['nome'],
            'fromEmail' => $validated['email'],
            'subject' => $validated['assunto'],
            'message' => $validated['mensagem'],
        ]));

        return redirect()->back()->with('enviado', 'Email enviado com Sucesso, Responderemos o mais rápido possível!');
    }
}