@extends('layouts.index')

@section('title', 'Villa Mirador - Blog')

@section('style')
 <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/blog.js') }}"  defer></script>
@endsection

@section('header')
 <h1>Il Blog di Villa Mirador <button id=
@if (session('_mirador_user')!=null)
    "form-btn";
@else
    "add_blog_button_off";
@endif
>Inserisci Articolo</button></h1>
@endsection

@section('contenuto')

<form id="article-form" class="form-box" name="blog" action="{{url('store')}}" method='post'>
    @csrf
    <h3>Crea un nuovo articolo</h3>
    <input type="text" id="title" name="title" placeholder="Titolo"><br><br>
    <input id="content" type="text" name="content" placeholder="Contenuto..."><br><br>
    <input id="submit-btn" type="submit" value="Pubblica">
</form>

<div id="blog-container">
    <p>Caricamento articoli...</p>
</div>
@endsection
