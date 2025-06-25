@extends('layouts.index') 

@section('title', 'Villa Mirador - Home')

@section('style')
@endsection

@section('script')
@endsection

@section('header')
    <div id="intestazione" style="background-image : url({{asset('img/mirador2_2.jpg')}})">
         <h1>Romantica e</br>Suggestiva</h1>
         <p>Per vivere ogni momento come in una favola<br></p>
     </div>
@endsection

@section('contenuto')
    <div id="meteo">
        <img src="{{ asset('img/meteo.png') }}">
    </div>

    <div id="mappa">
        <img src="{{ asset('img/mappa.jpg') }}">
    </div>

    <section id="paragrafo1">
        <div id="par1block1">
            <img src="https://www.villamirador.it/wp-content/uploads/sala-aurora-villa-mirador-ricevimenti-catania.jpeg" />
        </div>
        <div id="par1blockt">
            <h1>Ricevimenti Catania</br>Villa matrimoni Catania</br>Villa Mirador</h1>
            <p>Villa Mirador è un'oasi di bellezza e fascino nel cuore dell'entroterra etneo, terrazza panoramica sopra la splendida costa jonica. Romantica e sofisticata, la location vi avvolgerà in un'atmosfera magica, dove ogni particolare sarà personalizzato per diventare il riflesso dei vostri sogni e desideri.</p>
            <p>La residenza è circondata da un giardino che ospita un'artistica piscina, magico sfondo per i vostri eventi serali, grazie ai suggestivi giochi di luci e di melodie. Il nostro personale altamente qualificato sarà lieto di consigliarvi lungo tutto il percorso che vi condurrà alla realizzazione del vostro ricevimento.</p>
        </div> 
        <div id="par1block">
            <img src="https://www.villamirador.it/wp-content/uploads/villa-mirador-zafferana-etnea.jpg" />
        </div>
    </section>

    <section id="paragrafo2">
      <div id="testo">
        <div class="par2block">
          <h1>Una raffinata sala ricevimenti a </br>pochi passi dall'Etna</h1>
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
          <img id="par2g" src="img/mirador5.jpg">
          <div class="center">Sala Antares</div>
        </div>
      </div>
    </section>

    <section id="paragrafo3">
      <div id="par3block">
        <img src="img/mirador1.png"/>
      </div>

      <div id="par3blockt">
        <p >
          Situata ai piedi dell’Etna, a pochi km da Catania, Villa Mirador sarà la cornice ideale per decorare i giorni più belli della vostra vita. Gli ambienti interni della lussuosa residenza antica che ospita la villa sono il connubio perfetto tra tradizione e innovazione.
        </p>
        <p >
          Dal menù agli allestimenti, ogni particolare sarà curato e personalizzato per dare a ogni evento uno stile irripetibile. Gli arredi raffinati creano ambienti intimi e accoglienti, a cui fanno da sfondo gli incantevoli scorci siciliani dell’Etna e dello Jonio.
        </p>
        <p >
          Le sale vi affascineranno grazie alla loro eleganza e ai giochi di luci e di acqua. L’alta professionalità del suo staff e la continua ricerca di soluzioni originali e creative contraddistinguono da sempre Villa Mirador nell’arte del ricevimento e del banqueting etneo.            
        </p>
      </div>
    </section>

    <section id="paragrafo4" style="background-image : url('img/mirador4_2.jpg');">
      <h1>Rendi unici e indimenticabili i </br>giorni più belli della tua vita.</h1>
      <p>Scopri i nostri servizi e scegli la soluzione migliore per coronare il tuo ricevimento</p>
      <a class="button">Richiedi un appuntamento</a>
    </section>

    <section id="tripadvisor">
      <img src="img/TripAdvisor_Logo.svg">
    </section>
@endsection


@section('info')
    <section  id="newsletter">
        <div class="newsletter-box">
          <h1>Iscriviti alla newsletter</h1>
          <p>Iscriviti alla newsletter di Villa Mirador e resta sempre aggiornato sugli eventi,
             tendenze, curiosità e promozioni.</p>
        </div>

        <div class="newsletter-box" >
          <div>
            <input type="text" placeholder="Nome" >
            <input type="text" placeholder="Cognome">
          </div>

          <div>
            <input type="text" placeholder="Inserisci il tuo indirizzo email">
            <input type="button" value="Iscriviti" />
          </div>
          <div>
            <input type="checkbox" />
              Presa visione della privacy policy, acconsento al trattamento dei dati personali per l'iscrizione alla newsletter e l'invio di comunicazioni commerciali e promozionali.
          </div>
        </div>
    </section>
@endsection
