@extends('layouts.index')

@section('title', 'Villa Mirador - Menù')

@section('style')
 <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/menu.js') }}"  defer></script>
@endsection

@section('header')
 <h1>I Menù di Villa Mirador</h1>
@endsection

@section('contenuto')
<div id="menu">
    <div id="singolo_menu">
        <div><h2>Menù di Carne</h2></div>
        <div class="sottotitolo"><h3>Aperitivo di Benvenuto</h3></div>
        <div class="piatti">
            <div>• Taglieri di salumi</div>
            <div>• Mini tartare di manzo con crema di senape e crostino</div>
            <div>• Polpettine di vitello al limone</div>
            <div>• Arrosticini di agnello mignon</div>
            <div>• Calici di prosecco, cocktail analcolici, vini bianchi freschi</div>
        </div>
        <div class="sottotitolo"><h3>Antipasti</h3></div>
        <div class="piatti">
            <div>• Carpaccio di manzo con rucola, scaglie di Parmigiano e riduzione di balsamico</div>
            <div>• Flan di verdure con fonduta al formaggio e crumble croccante</div>
        </div>
        <div class="sottotitolo"><h3>Primi Piatti</h3></div>
        <div class="piatti">
            <div>• Ravioli di brasato al Barolo con burro e salvia</div>
            <div>• Risotto al tartufo e salsiccia mantecato al Castelmagno</div>
        </div>
        <div class="sottotitolo"><h3>Secondo Piatto</h3></div>
        <div class="piatti">
            <div>• Filetto di manzo in crosta con patate duchessa e carciofi trifolati</div>
        </div>
        <div class="sottotitolo"><h3>Dessert</h3></div>
        <div class="piatti">
            <div>• Torta</div>
            <div>• Buffet di dolci: mousse al cioccolato, mini cheesecake, panna cotta ai frutti di bosco</div>
            <div>• Frutta fresca e fontana di cioccolato</div>
        </div>
    </div>

    <div id="singolo_menu">
        <div><h2>Menù di Pesce</h2></div>
        <div class="sottotitolo"><h3>Aperitivo di Benvenuto</h3></div>
        <div class="piatti">
            <div>• Ostriche fresche con limone e pepe rosa</div>
            <div>• Tartare di tonno rosso con avocado e lime</div>
            <div>• Gamberi in tempura con salsa agrodolce</div>
            <div>• Insalata di mare tiepida con sedano e agrumi</div>
            <div>• Mini spiedini di polpo e patate</div>
            <div>• Bollicine di benvenuto, cocktail analcolici, vini bianchi aromatici</div>
        </div>
        <div class="sottotitolo"><h3>Antipasti</h3></div>
        <div class="piatti">
            <div>• Carpaccio di branzino con zeste di limone, pepe rosa e olio al basilico</div>
            <div>• Mazzancolle su crema di piselli e menta</div>
        </div>
        <div class="sottotitolo"><h3>Primi Piatti</h3></div>
        <div class="piatti">
            <div>• Risotto al profumo di mare con scampi e zafferano</div>
            <div>• Paccheri con ragù bianco di pescatrice e zucchine, profumo di limone</div>
        </div>
        <div class="sottotitolo"><h3>Secondo Piatto</h3></div>
        <div class="piatti">
            <div>• Filetto di rombo in crosta di patate con salsa al prosecco e asparagi</div>
        </div>
        <div class="sottotitolo"><h3>Dessert</h3></div>
        <div class="piatti">
            <div>• Torta</div>
            <div>• Buffet di dolci: babà al limoncello, tartellette alla crema e frutta, mousse al cocco</div>
            <div>• Frutta esotica fresca e piccola pasticceria</div>
        </div>
    </div>
</div>

<div id=@if (session('_mirador_user')!=null)
            "preferiti"
        @else
            "preferiti_off"
        @endif >
        <div id=titolo>Vuoi personalizzare la tua carta del menù? <br> Proponi degli sfondi
          <button id="aggiungi">Aggiungi Sfondo</button>
          <button id="l_preferiti">Sfondi Preferiti</button>
        </div>
    </div>

    <div id="finestra_ricerca">
        <div class="contenuto">
            <button class="chiudi">X</button>
            <form id="ricerca">
                <input type="text" class="search-bar" name="s-bar" placeholder="Cerca sfondo...">
                <input id="submit-btn" type='submit' value="Cerca">    
            </form>
            <div class="show-img">
             
            </div>
        </div>
    </div>

    <div id="finestra_preferiti">
        <div class="contenuto">
            <button class="chiudi">X</button>
            <div class="show-img">
            </div>
            <div id="msg_pref">
              Non sono stati salvati sfondi
            </div>
        </div>
    </div>

@endsection
