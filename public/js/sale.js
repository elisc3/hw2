
function response(response) {
    if (!response.ok) {
        console.log("Errore in response");
        return null;
    } else {
        return response.json();
    }
}

function jsonSale(rjson) {
    // Controlla se rjson è valido
    if (!rjson || !Array.isArray(rjson)) {
        console.log("Dati non validi ricevuti");
        return;
    }
    
    const block = document.querySelector('#sale'); 
    console.log(block);
    const N = rjson.length;
    console.log(N);
    
    for (let i = 0; i < N; i++) {
        let cont_a = document.createElement("a");
        cont_a.href = "/descrizione/"+rjson[i].id+"/"+rjson[i].nome+"/"+rjson[i].link;
        let cont_img = document.createElement("img");
        cont_img.src = "img/" + rjson[i].link;
        cont_a.appendChild(cont_img);
        let cont_d = document.createElement("div");
        cont_d.classList.add("nome_sala");
        cont_d.textContent = rjson[i].nome;
        cont_a.appendChild(cont_img);
        cont_a.appendChild(cont_d); 
        block.appendChild(cont_a);
    }
}

// Usa la nuova rotta Laravel invece di carica_sale.php
fetch("/carica_sale").then(response).then(jsonSale); 