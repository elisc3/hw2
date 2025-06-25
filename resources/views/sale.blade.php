@extends('layouts.index')

@section('title', 'Villa Mirador - Sale')

@section('style')
 <link rel="stylesheet" href="{{ asset('css/sale.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/sale.js') }}"  defer></script>
@endsection

@section('header')
    <div id="intestazione3"  style="background-image : url({{asset('img/mirador12.jpg')}})">
        <h1>Stile, eleganza<br>e originalità</h1>
        <p>Villa Mirador è la location ideale per realizzare e condividere i tuoi sogni<br></p>
    </div>
@endsection

@section('contenuto')
<div id="sale">
   
</div>
@endsection

