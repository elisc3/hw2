<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /* Mostra la pagina delle sale */
    public function index(Request $request)
    {
        // Salva la pagina corrente in sessione
         session(['page' => 'sale']);
        
        return view( 'sale' );
    }
    
    /* API endpoint per ottenere tutte le sale (equivalente del carica_sale.php)
      Restituisce tutte le sale in formato JSON */
    public function caricaSale()  
    {
        
        $res = DB::table('sale') 
            ->orderBy('nome')
            ->get(); 

        foreach( $res as $sala) { 
            $sale[] = ['id'=>$sala->id, 'nome'=>$sala->nome, 'link'=>$sala->link,]; 
        }
        return $sale;
    }

    public function show($id, $nome, $file)
    {
        $res = DB::table('sale')->where('id', $id)->first(); 

        // Salva la pagina corrente e i parametri in sessione
        session(['page' => 'descrizione']);
        $args=['id'=>$id, 'nome'=> $nome, 'file'=>$file, 'descr'=>$res->descrizione];
        session(['args'=>$args]);
        
        // Richiama la vista con i parametri relativi alla sala
        return view('descrizione') 
            ->with('nome',$nome)
            ->with('file', $file)
            ->with('descrizione', $res->descrizione);
    }
}