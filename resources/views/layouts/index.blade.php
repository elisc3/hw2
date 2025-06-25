<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name='csrf-token' content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title> 
    
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @section('style') 
    @show
    <script src="{{ asset('js/index.js') }}" defer></script>
    @section('script') 
    @show
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="info">
        <div class="info-item-sx perc50">
            <a><img src="{{ asset('img/facebook.png') }}"/></a>
            <a><img src="{{ asset('img/instagram.png') }}"/></a>
            <a><img src="{{ asset('img/youtube.png') }}"/></a>
            <a><img src="{{ asset('img/twitter.png') }}"/></a>
            <a><img src="{{ asset('img/tripadvisor.png') }}"/></a>
        </div>
        <div class="info-item-dx perc50">
            <a class="info-item">info@villamrador.it</a>
            <a class="info-item">+39 0957082890</a>
        </div>
    </div>

     <nav id="links">
        <div class="info-item-sx perc30">
            <a href="{{ route('ricevimenti') }}"><strong>Ricevimenti</strong></a> <!-- route fa il collegamento -->
            <a href="{{ route('sale') }}"><strong>Le Sale</strong></a>
            <a href="{{ route('menu') }}"><strong>Menù</strong></a>
        </div>
        <div class="info-item-c perc30">
            <a href="{{ route('home') }}">
                <!-- <img src="https://www.villamirador.it/wp-content/uploads/2021/09/logo.png" /> -->
                <img src='{{ asset("img/logo.png") }}' /> 
            </a>
        </div>
        <div class="info-item-dx perc30">
            <a><strong>Eventi</strong></a>
            <a href="{{ route('blog') }}"><strong>Blog</strong></a>
            <a><strong>Contatti</strong></a>
        </div>
        
        <div id="menu_button">
            <div class="linea"></div>
            <div class="linea"></div>
            <div class="linea"></div>
            <div class="chiusura nascosto">X</div>
        </div>

        <div class="menu-content nascosto">
            <a href="{{ route('ricevimenti') }}"><strong>Ricevimenti</strong></a>
            <a href="{{ route('sale') }}"><strong>Le Sale</strong></a>
            <a href="{{ route('menu') }}"><strong>Menù</strong></a>
            <a><strong>Eventi</strong></a>
            <a href="{{ route('blog') }}"><strong>Blog</strong></a>
            <a><strong>Contatti</strong></a>
        </div>
    </nav>
 
    <header>
     @section('header')
     @show
    </header>
    
    <div id="utente">
        @if (session('_mirador_user')!=null) <!-- qualcuno è loggato -->
            <a href='{{route("logout")}}' ><img src='{{asset("img/esci.jpg")}}' ?> </a>
        @else
            <a href='{{route("login")}}' ><img src='{{asset("img/utente.jpg")}}' ?> </a>
        @endif
    </div>

    @section('contenuto')
    @show

    <div id="box"> 
      @section('info')
      @show

      <section id="infofine">

        <div class="info-box">
          <h1>Contatti</h1>
          <p>info@villamirador.it</p>
          <p>+39 095 7082890</p>
        </div>

        <div class="info-box">
          <h1>Dove siamo</h1>
          <p>Strada Provinciale,<br/>
            Zafferana Milo 23,<br/>
            95019 Zafferana Etnea CT</p>
          <h1>Orari di ricevimento</h1>
          <p>Martedì-Domenica<br/>
            09:30 – 13:00 / 14:30 – 19:30,<br/>
            Lunedì chiusi</p>
        </div>

        <div class="info-box">
          <h1>Menu principale</h1>
          <a>Ricevimenti<br/></a>
          <a>Le Sale<br/></a>
          <a>Virtual Tour<br/></a>
          <a>Eventi<br/></a>
          <a>Blog<br/></a>
          <a>Contatti<br/></a>
        </div>

        <div class="info-box">
          <h1>Informazioni legali</h1>
          <a>Privacy Policy<br/></a>
          <a>Cookie policy<br/></a>
        </div>

      </section>
    </div>

    <footer>
      <p>© 2021 Villa Mirador tutti i diritti riservati – P.iva 03890900875</p>
    </footer>

</body>
</html>