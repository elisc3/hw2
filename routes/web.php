<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RicevimentiController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BlogController;


// La HOME page
Route::get('/', [HomeController::class, 'index'])->name('home');  
Route::get('/home', [HomeController::class, 'index']);

// Gestione della pagina RICEVIMENTI
Route::get('/ricevimenti', [RicevimentiController::class, 'index'])->name('ricevimenti');

// Gestione della pagina SALE
Route::get('/sale', [SaleController::class, 'index'])->name('sale');
Route::get('/carica_sale', [SaleController::class, 'caricaSale']);
Route::get('/descrizione/{id}/{nome}/{file}', [SaleController::class, 'show']); 

// Gestione della pagina dei menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
// ---- API -----    
Route::get('/preferiti', [MenuController::class, 'favorites']);
Route::get('/ricerca_immagini/{str}', [MenuController::class, 'search']);
Route::get('/add_img', [MenuController::class, 'add_img']);
Route::get('/remove_img', [MenuController::class, 'remove_img']);
// ---- FINE API -----

// Routes per autenticazione
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); 
Route::post('/login', [AuthController::class, 'login']); 
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register'); 
Route::post('/register', [AuthController::class, 'register']);
// ---- API -----
Route::get('/check-username', [AuthController::class, 'checkUsername'])->name('check.username');
Route::get('/check-email', [AuthController::class, 'checkEmail'])->name('check.email');
// ---- FINE API -----

// Routes per il blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
     // Route per ottenere i post (API)
Route::get('/posts', [BlogController::class, 'getPosts'])->name('blog.posts');
     // Route per inserire un post
Route::post('/store', [BlogController::class, 'store'])->name('blog.store');



