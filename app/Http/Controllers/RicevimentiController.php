<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RicevimentiController extends Controller
{
    public function index(Request $request)
    {
        // Salva la pagina corrente in sessione
        session(['page' => 'ricevimenti']);
       
        return view('ricevimenti');
    }
}