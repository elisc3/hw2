const PASSWORD_MIN = 4;
const USERNAME_MAX = 10;

function Nome(event) {
    const input = event.currentTarget;

    event.target.style.background = "";
    
    if (formStatus[input.name] = (input.value.length > 0)) {
        input.parentNode.classList.remove('errore'); 
    } else {
        input.parentNode.classList.add('errore');
    }
}

function Cognome(event) {
    const input = event.currentTarget;

    event.target.style.background = "";
    
    if (formStatus[input.surname] = (input.value.length > 0) ) {
        input.parentNode.classList.remove('errore');
    } else {
        input.parentNode.classList.add('errore');
    }
}

function jsonUsername(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.username = !json.exists) { 
        document.querySelector('.username').classList.remove('errore');
    } else {
        document.querySelector('.username span').textContent = "Nome utente in uso";
        document.querySelector('.username').classList.add('errore');
    }
}

function jsonEmail(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errore');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errore');
    }
}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function Username(event) {
    const input = document.querySelector('.username input');

    event.target.style.background = "";

    const exp=/^[a-zA-Z0-9_]{1,10}$/ ;
    if( !(exp.test(input.value)) ) {
        input.parentNode.querySelector('span').textContent = "Non sono ammessi caratteri differenti da lettere maiuscole e minuscole, numeri e _";
        input.parentNode.classList.add('errore');
        formStatus.username = false;
    }
    else { 
        formStatus.username = true;
        input.parentNode.classList.remove('errore');
       fetch("/check-username?q="+encodeURIComponent(input.value)).then(fetchResponse).then(jsonUsername);
    }   
}

function Email(event) {
    const input = document.querySelector('.email input');

    event.target.style.background = "";

    const exp= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
    if(!exp.test(String(input.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errore');
        formStatus.email = false;
    } 
    else {
        formStatus.email = true; 
        input.parentNode.classList.remove('errore');
       console.log(encodeURIComponent(String(input.value).toLowerCase()));
       fetch("/check-email?q="+encodeURIComponent(String(input.value).toLowerCase())).then(fetchResponse).then(jsonEmail);
    }
}

function Password(event) {
    const passwordInput = document.querySelector('.password input');

    event.target.style.background = "";

    if (formStatus.password = (passwordInput.value.length >= PASSWORD_MIN)) {
        document.querySelector('.password').classList.remove('errore');
    } else {
        document.querySelector('.password').classList.add('errore');
    }
}

function Signup(event) {
    const checkbox = document.querySelector('.conferma input');
    formStatus[checkbox.name] = checkbox.checked;
    if (Object.keys(formStatus).length !== 7 || Object.values(formStatus).includes(false)) {
        event.preventDefault();
    } 
} 

function stileFocus(event){
    event.target.style.background = "pink";
}



const formStatus = {'upload': true};

document.querySelector('.nome input').addEventListener('blur', Nome);
document.querySelector('.nome input').addEventListener('focus', stileFocus);
document.querySelector('.cognome input').addEventListener('blur', Cognome);
document.querySelector('.cognome input').addEventListener('focus', stileFocus);
document.querySelector('.username input').addEventListener('blur', Username);
document.querySelector('.username input').addEventListener('focus', stileFocus);
document.querySelector('.email input').addEventListener('blur', Email);
document.querySelector('.email input').addEventListener('focus', stileFocus);
document.querySelector('.password input').addEventListener('blur', Password);
document.querySelector('.password input').addEventListener('focus', stileFocus);

document.querySelector('form').addEventListener('submit', Signup);