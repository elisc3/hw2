<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        // Se già loggato, reindirizza alla home
        if (session('_mirador_user')!=null)
            return redirect()->route('home');
        
        if ($request->errors==null)
            $request->errors='none';
        return view('login')->with('errors', $request->errors);
    }

    public function login(Request $request)
    {
        // Se già loggato, reindirizza alla home
        if (session('_mirador_user')!=null)
            return redirect()->route('home');

        if( strlen($request->username)==0 || strlen($request->password)==0){
            return view('login')->with('errors', 'Inserisci username e password.');
        }
        
        // l'unicita' dello username e' garantita quando un nuovo utente si registra
        // quindi il risultato della query e' con una o con zero righe
        $res=DB::table('utenti')->where('username', $request->username)->get();
        if( count($res)>0 ) {  // lo username e' stato trovato
            if ($res[0]->password == $request->password) { // la password inserita corrisponde 
                session(['_mirador_username' => $res[0]->username]);
                session(['_mirador_user' => $res[0]->id]);
                $args="";
                if (session("page")=="descrizione"){
                    $args=session("args");
                    return view(session('page'))
                            ->with('nome',$args['nome'])
                            ->with('file',$args['file'])
                            ->with('descrizione', $args['descr']);
                } 
                else return redirect()->route(session('page'));
            }
        }
        return view('login')->with('errors', 'Username e/o password errati.');
    }

    public function logout(Request $request)
    {
        // Memorizzo la pagina da cui e' stato fatto il logout
        $prev_page=session("page");
        $args="";
        if (session("page")=="descrizione")
            $args=session("args");
        session()->flush(); 
        session(['page'=>$prev_page]);
        $request->session()->regenerateToken();
        if ($prev_page=="descrizione") {
            session(['args'=>$args]);
            // Reindirizza alla pagina precedente
            return view($prev_page)
                    ->with("nome", $args["nome"])
                    ->with("file", $args["file"])
                    ->with("descrizione", $args["descr"]);
        }
        
        // Reindirizza alla pagina precedente
        return redirect()->route( session('page'));
    }

    public function showRegistrationForm(Request $request)
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $PASSWORD_MIN = 4;
        $error=array();
      
        if (strlen($request->nome)==0 || 
            strlen($request->cognome)==0 ||
            strlen($request->username)==0 ||
            strlen($request->email)==0 ||
            strlen($request->password)==0 ||
            $request->conferma!=1){
                $error = array("Riempi tutti i campi");
                return redirect()->route('register')->withInput();
            }

        // USERNAME
        // Controlla che lo username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,10}$/', $request->username)) {
            $error[] = "Non sono ammessi caratteri differenti da lettere maiuscole e minuscole, numeri e _";
        } else {
            // Cerco se username esiste gia'
            // si puo' usare il metodo "exists()" invece di "count()"
            $res=DB::table('utenti')->where('username', $request->username)->get();
            if( count($res)>0 ) {
                $error[] = "Username non disponibile";
            }
        }
        // PASSWORD
        if (strlen($request->password) < $PASSWORD_MIN) {
            $error[] = "Caratteri insufficienti";
        } 
        
        // EMAIL
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $res=DB::table('utenti')->where('email', $request->email)->get();
            // Cerco se email esiste gia'
            if( count($res)>0 ) {
                $error[] = "Email utilizzata da un altro utente";
            }
        }

        if (count($error) == 0) { //non c'è errore
            if ($id=DB::table('utenti')->insertGetId([
                        'username' => $request->username,
                        'password' => $request->password,
                        'name' => $request->nome,
                        'surname' => $request->cognome,
                        'email' => $request->email ]) > 0) {
                session(['_mirador_username' => $request->username]);
                session(['_mirador_user' => $id]);
                return redirect()->route('home');
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }
        return redirect()->route('register')->withInput();

    }

    // API endpoints per validazione AJAX
    public function checkUsername(Request $request)
    {
        $username = $request->q; //get('q');
        $exists = DB::table('utenti')->where('username', $username)->exists();
        // ritorna l'array in forma JSON
        return ['exists' => $exists];
    }

    public function checkEmail(Request $request)
    {
        $email = $request->q; 
        $exists = DB::table('utenti')->where('email', $email)->exists();
        // ritorna l'array in forma JSON
        return ['exists' => $exists];
    }
}