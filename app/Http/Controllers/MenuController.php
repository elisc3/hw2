<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function index()
    {
        // Salva la pagina corrente in sessione
        session(['page' => 'menu']);

        return view('menu' );
    }

    public function favorites()
    {
        // viene invocata solo se l'utente e' loggato, quindi non e' necessario controllare la sessione
        $resp=DB::table('immagini_preferiti')->where('user_id', session('_mirador_user'))->get();
        if (count($resp)==0) //se non ne trova
            return["success" => false, "message" => "Nessuna immagine tra i preferiti"];
        else
            return $resp;
    }

    public function search($str)
    {
        // $str: parametro con la stringa di ricerca 
        $err = ["success" => false, "message" => "Dati mancanti"];
        $apiKey = 'secret';
        $perPage = 10;
    
        $url = "https://api.pexels.com/v1/search?query=".$str."&per_page=".$perPage;
        $ch = curl_init(); // 

        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: $apiKey"]);

        $response = curl_exec($ch); 
        curl_close($ch); 
        if (curl_errno($ch)) {
            $err = json_encode(["success" => false, "message" => "Errore curl"]);
            return $err;
        } else {
            $decoded = json_decode($response, true); 
            if (isset($decoded['photos']) && count($decoded['photos']) > 0) { 
                return $response;
            } else {
                $err = json_encode(["success" => false, "message" => "Nessuna foto trovata o risposta inattesa"]);
                return $err;
            }
        }
    }

    
    public function add_img(Request $request)
    {
        $id = $request->id;
        $src = $request->l;

        if ( session('_mirador_user')==null ) // Non e' loggato alcun utente
            return ["success" => false, "message" => "Nessuna sessione utente"];

        $resp=DB::table('immagini_preferiti')
            ->where('user_id', session('_mirador_user'))
            ->where('id_img', $id)
            ->get();
        if (count($resp)>0) 
            return ["success" => false, "message" => "Immagine esistente"];

        if (DB::table('immagini_preferiti')->insert([
                'id_img' => $id,
                'user_id' => session('_mirador_user'),
                'link' => $src ]) ) {
            return ["success" => true, "message" => "Immagine salvata"];
        } else
            return ["success" => false, "message" => "Errore di connessione al Database"];                        
    }
    
    public function remove_img(Request $request)
    {
        $id = $request->id;
        $src = $request->l;

        if ( session('_mirador_user')==null ) // Non e' loggato alcun utente
            return ["success" => false, "message" => "Nessuna sessione utente"];

        $resp=DB::table('immagini_preferiti')
            ->where('user_id', session('_mirador_user'))
            ->where('id_img', $id)
            ->get();
        if (count($resp)==0) 
            return ["success" => false, "message" => "Immagine non presente tra i preferiti"];

        if (DB::table('immagini_preferiti')
                ->where('id_img', $id)
                ->where('user_id', session('_mirador_user'))
                ->delete() == 1 ) {  
            return ["success" => true, "message" => "Immagine eliminata"];
        } else
            return ["success" => false, "message" => "Errore di connessione al Database"];
    }
}