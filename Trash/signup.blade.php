<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='{{ asset("css/signup.css") }}'>
    <script src='{{ asset("js/signup.js") }}' defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Iscriviti</title>
</head>
<body>
    <div id="logo">
        <img src="https://www.villamirador.it/wp-content/uploads/2021/09/logo.png" />
    </div>
    <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <form name='signup' method='post' action="{{ route('register') }}" enctype="multipart/form-data" autocomplete="off">
                @csrf
                
                <div class="nome"> 
                    <label for='nome'>Nome</label>
                    <input type='text' name='nome' value="{{ old('nome') }}" >
                    <div class="error-msg"> 
                        <img src="{{ asset('img/x.svg') }}"/> 
                        <span>Inserisci il tuo nome</span>
                    </div>
                </div>

                <div class="cognome">
                    <label for='cognome'>Cognome</label>
                    <input type='text' name='cognome' value="{{ old('cognome') }}" >
                    <div class="error-msg"> 
                        <img src="{{ asset('img/x.svg') }}"/> 
                        <span>Inserisci il tuo cognome</span>
                    </div>
                </div>
              
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username' value="{{ old('username') }}" >
                    <div class="error-msg"> 
                        <img src="{{ asset('img/x.svg') }}"/> 
                        <span>Nome utente non disponibile</span>
                    </div>
                </div>

                <div class="email">
                    <label for='email'>Email</label>
                    <input type='email' name='email' value="{{ old('email') }}" >
                    <div class="error-msg"> 
                        <img src="{{ asset('img/x.svg') }}"/> 
                        <span>Indirizzo email non valido</span>
                    </div>
                </div>

                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' >
                    <div class="error-msg"> 
                        <img src="{{ asset('img/x.svg') }}"/> 
                        <span>Numero di caratteri non sufficiente</span>
                    </div>
                </div>

                <div class="conferma"> 
                    <input type='checkbox' name='conferma' value="1" {{ old('conferma') ? 'checked' : '' }} >
                    <label for='conferma'>Accetto termini e condizioni</label>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class='errore'>
                            <img src='{{ asset("img/x.svg") }}'/>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                @endif

                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="{{ route('login') }}">Accedi</a></div>
        </section>
    </main>
</body>
</html>