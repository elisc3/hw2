<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class BlogController extends Controller
{
    /*Mostra la pagina del blog*/
    public function index()
    {
        // Salva la pagina corrente in sessione
        session(['page' => 'blog']);
        
        return view('blog');
    }

    /*Aggiunge un nuovo post al blog*/
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
            ]);

        // Crea il nuovo post
        if ($res=DB::table('posts')->insertGetId([ 
                                'title' => $request->title,
                                'author_id' => session('_mirador_user'),
                                'content' => $request->content
                                                ]) > 0)
            return view('blog');

    }


    /*Ottiene i post del blog (API endpoint)*/
    public function getPosts()
    {
        $maxPosts = 5;

        $posts = DB::table('posts')
            ->join('utenti', 'utenti.id', '=', 'posts.author_id')
            ->select('posts.title', 'posts.content', 'posts.created_at', 'utenti.username')
            ->orderBy('posts.created_at', 'desc')
            ->limit($maxPosts)
            ->get();

        return response()->json($posts); 
    }
}