@extends('layouts.index')

@section('title', 'Villa Mirador - Ricevimenti')

@section('style')
 <link rel="stylesheet" href="{{ asset('css/ricevimenti.css') }}">
@endsection

@section('scripts')
@endsection

@section('header')
 <div id="intestazione2" style="background-image : url( {{ asset('img/mirador10.jpg') }} )">
        <h1>Magica location per</br>ricevimenti</h1>
        <p>L’esperienza e la professionalità dei maestri del banqueting al tuo servizio<br></p>
 </div>
@endsection

@section('contenuto')

<section id="paragrafo3">
    <div id="par3blockt">
        <h1>La location</h1>
        <p>
            Villa Mirador è il luogo ideale per festeggiare matrimoni, compleanni, battesimi, cresime e qualsiasi altro evento meriti una celebrazione speciale. I verdi vialetti vi guideranno fra i giardini della villa e le sue splendide fontane, scenario ideale per eventi all'aperto e romantiche passeggiate.
        </p>
        <p>
            Lo spazioso bordo piscina renderà indimenticabili alcuni dei vostri momenti più importanti, grazie ai suoi arredamenti ricercati e agli scorci panoramici.        
        </p>
        <p>
            Le sale, ampie e raffinate, stupiranno i vostri ospiti con un concerto di luci, colori e stili differenti, dal moderno al più classico.            
        </p>
    </div>

    <div id="par3block">
        <img src="{{ asset('img/mirador1.png') }}" alt="Villa Mirador Location"/>
    </div>
</section>

<section id="paragrafo3">
    <div id="par3block">
        <img src="{{ asset('img/mirador11.jpg') }}" alt="Staff Villa Mirador"/>
    </div>

    <div id="par3blockt">
        <h1>Lo staff</h1>
        <p>
            Villa Mirador vanta uno staff altamente preparato e cortese, che contribuirà alla perfetta riuscita del vostro ricevimento.
        </p>
        <p>
            Le nostre hostess e i nostri steward vi assisteranno durante tutta la durata del ricevimento, agevolando il sereno svolgimento dell'evento.
        </p>
        <p>
            Grazie alla loro maestria, i nostri chef sedurranno i palati più raffinati con ricette uniche, realizzate solo con prodotti di stagione accuratamente selezionati. I piatti proposti dai nostri chef sono un mix perfetto di tradizione e creatività, garanzia del sapore e della ricchezza della prelibata gastronomia siciliana.
        </p>
    </div>
</section>

<section id="paragrafo2">
    <div id="testo">
        <div class="par2block">
            <h1>Una raffinata sala ricevimenti a<br>pochi passi dall'Etna</h1>
        </div>
        <div class="par2block">
            <p>
                Ampie e luminose, le sale ricevimento di Villa Mirador daranno un tocco romantico
                e sofisticato ai vostri eventi grazie ai loro arredi ricercati.
                Approfitta dei nostri virtual tour per scoprire i giochi di luci, 
                colori e stili che contraddistinguono ogni sala.
            </p>
        </div>
    </div>

    <div id="galleria">
        <div class="galleria-box" id="g1" data-pos="0">
            <img id="par2g" src="{{ asset('img/mirador5.jpg') }}" alt="Sala Antares">
            <div class="center">Sala Antares</div>
        </div>
    </div>
</section>

<section id="tripadvisor">
    <img src="{{ asset('img/TripAdvisor_Logo.svg') }}" alt="TripAdvisor">
</section>
@endsection

@section('info')
@endsection

