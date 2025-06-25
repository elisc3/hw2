<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='{{ asset("css/login.css") }}'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Villa Mirador - Accedi</title>
</head>
<body>
    <div id="logo">
        <a href="{{ route('home') }}">
                <!-- <img src="https://www.villamirador.it/wp-content/uploads/2021/09/logo.png" /> -->
                <img src='{{ asset("img/logo.png") }}' />
        </a>
    </div>
    <main class="login">
        <section class="main">
            @if ( $errors != 'none')
                <p class='error'>{{ $errors }}</p>
            @endif
            
            <form name='login' method='post' action="{{ route('login') }}"> 
                @csrf 
                <div class="username">
                    <label for='username'>Username</label>
                    <input type='text' name='username'> 
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password'>
                </div>
                <div class="submit-container">
                    <div class="login-btn">
                        <input type='submit' value="ACCEDI"> 
                    </div>
                </div>
            </form>
            <div class="signup"><h4>Oppure</h4></div>
            <div class="signup-btn-container">
                <a class="signup-btn" href="{{ route('register') }}">ISCRIVITI</a>
            </div>
        </section>
    </main>
</body>
</html>