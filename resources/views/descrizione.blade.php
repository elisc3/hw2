@extends('layouts.index')

@section('title', 'Villa Mirador - Descrizione sala {{$nome}}')

@section('style')
 <link rel="stylesheet" href="{{ asset('css/descrizione.css') }}">
@endsection

@section('script')
@endsection

@section('header')
@endsection

@section('contenuto')
<div id="contenuto_sala">
    <img 
        src="{{ asset('img/'.$file) }}"
        alt="{{ $nome }}" 
    > 
    <section id="desc_sala">
        "{{ $descrizione }}"
    </section>
</div>
@endsection
