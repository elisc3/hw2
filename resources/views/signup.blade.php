<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='{{ asset("css/signup.css") }}'>
    <script src='{{ asset("js/signup.js")}}' defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mirador - Iscriviti</title>
</head>
<body>
    <div id="logo">
        <a href="{{ route('home') }}">
                <!-- <img src="https://www.villamirador.it/wp-content/uploads/2021/09/logo.png" /> -->
                <img src='{{ asset("img/logo.png") }}' />
        </a>
    </div>
    <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <form nome="signup" method="post" enctype="multipart/form-data" autocomplete="off" action="{{route('register')}}">
                @csrf
                <div class="nome"> 
                        <label for="nome">Nome</label>
                        <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina -->
                        <input type="text" name="nome" @if (isset($request)) value="{{ $request->old('nome') }}" @endif>
                        <div> <img src="{{ asset('img/x.svg') }}"> <span>Inserisci il tuo nome</span></div>
                </div>
                <div class="cognome">
                        <label for="cognome">Cognome</label>
                        <input type="text" name="cognome"  @if (isset($request)) value="{{ $request->old('cognome') }}" @endif>
                        <div> <img src="{{ asset('img/x.svg') }}"> <span>Inserisci il tuo cognome</span></div>
                </div>
                <div class="username">
                    <label for="username">Nome utente</label>
                    <input type="text" name="username"  @if (isset($request)) value="{{ $request->old('surname') }}" @endif>
                    <div> <img src="{{ asset('img/x.svg') }}"> <span>Nome utente non disponibile</span></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type="text" name="email"  @if (isset($request)) value="{{ $request->old('email') }}" @endif>
                    <div> <img src="{{ asset('img/x.svg') }}"> <span>Indirizzo email non valido</span></div>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password"  @if (isset($request)) value="{{ $request->old('password') }}" @endif>
                    <div> <img src="{{ asset('img/x.svg') }}"> <span>Numero di caratteri non sufficiente</span></div>
                </div>
                <div class="conferma"> 
                    <input type="checkbox" name='conferma' value="1">
                    <label for="conferma">Accetto termini e condizioni</label>
                </div>
                @if ($errors->any())
                    <div class='errore'><img src="{{ asset('img/x.svg') }}"><span> {{ $message }} </span></div>
                @endif
                <div class="submit">
                    <input type="submit" value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="{{route('login')}}">Accedi</a>
        </section>
        </main>
</body>
</html>