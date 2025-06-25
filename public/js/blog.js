
const Btn = document.querySelector('#form-btn');
const form = document.querySelector('#article-form');


function apertura(event){
    if (form.style.display == 'none' || form.style.display == '') {
      form.style.display = 'block';
    } else {
      form.style.display = 'none';
    }
}

function blogJSON(resJSON){
  const blist = document.querySelector("#blog-container");
  blist.innerHTML='';
  console.log(resJSON );

  for(let i=0; i<resJSON.length; i++ ){
    const block = document.createElement('div');
    block.id="blocco";
    const title = document.createElement('div');
    title.classList.add('titolo');
    //const testo=document.createElement('h2');
    title.textContent=resJSON[i].title;
    const content = document.createElement('div');
    content.classList.add('testo');
    content.textContent=resJSON[i].content;
    const info = document.createElement('div');
    info.classList.add('info');
    const username = document.createElement('div');
    username.classList.add('username');
    username.textContent=resJSON[i].username;
    const data = document.createElement('div');
    data.classList.add('data');
    data.textContent=resJSON[i].created_at;
    info.appendChild(username);
    info.appendChild(data);
    block.appendChild(title);
    block.appendChild(content);
    block.appendChild(info);
    blist.appendChild(block);
  }
}

function blogResponse(res) {
  return res.json();
}


if (Btn!=null)
  Btn.addEventListener('click', apertura);

/* Creazione dei <div > con gli articoli del blog */
fetch("/posts").then(blogResponse).then(blogJSON);

