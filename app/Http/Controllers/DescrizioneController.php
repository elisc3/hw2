<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class DescrizioneController extends Controller
{
    public function show($nome, $file, $descr)
    {
        return $descr;
        // Validazione dei parametri
        /*
         $request->validate([
            'nome' => 'required|string',
            'f' => 'required|string',
            'd' => 'required|string'
        ]);
        */
        // Salva la pagina corrente e i parametri in sessione
        session(['page' => 'show']);
        $args=['nome'=> $nome, 'file'=>$file, 'descr'=>$descr];
        session(['args'=>$args]);
        
        // Prepara i dati per la vista
        $salaData = [
            'nome' => $request->nome,
            'immagine' => $request->f,
            'descrizione' => $request->d
        ];
        
        return view('descrizione')->with($salaData);
    }
    
    // Metodo alternativo per mostrare la descrizione tramite ID della sala
    public function showById(Request $request, $id)
    {
        $sala = Sale::findOrFail($id);
        
        // Salva la pagina corrente in sessione
        $request->session()->put('page', 'descrizione');
        $request->session()->put('args', '?id=' . $id);
        
        // Controlla se l'utente è autenticato
        $isLoggedIn = auth()->check();
        
        // Prepara i dati per la vista
        $salaData = [
            'nome' => $sala->nome,
            'immagine' => $sala->link, // Assumendo che 'link' contenga il nome del file immagine
            'descrizione' => $sala->descrizione
        ];
        
        return view('pages.descrizione', compact('isLoggedIn', 'salaData'));
    }
}