if (window.innerWidth > 841) {
    document.querySelectorAll('.listFiltre')[0].remove();
    document.querySelector('#filtreProduit').remove();
    
    // console.dir(document.querySelectorAll('.listFiltre'));
} else {
    // console.dir(document.querySelectorAll('.listFiltre'));
}
 
const burgerMenu = document.querySelector('.burger_menu');
const dropMenu = document.querySelector('.drop_menu');
const itemdropMenu = document.querySelector('.itemdrop_menu');
const listFiltre = document.querySelector('.listFiltre');
const filtreProduit = document.querySelector('#filtreProduit');

const filtrePrix = document.querySelector('#filtrePrix');
const filtreFleur = document.querySelector('#filtreFleur');
const filtreCategorie = document.querySelector('#filtreCategorie');
const filtreCouleur = document.querySelector('#filtreCouleur');
const idLivraison = document.querySelector('.idlivraison');
const prix = document.querySelector('#prix');
const inputSearchVille = document.querySelector('#inputSearchVille');

// console.dir(filtreProduit);


 //update page 
window.addEventListener('resize', function() {
    location.reload();
});





//  burger menue  

burgerMenu.addEventListener('click', (event)=>{
    dropMenu.classList.toggle('drop_menu_active');
    burgerMenu.children[0].classList.toggle('dhidden');
    burgerMenu.children[2].classList.toggle('dhidden');
    burgerMenu.children[1].classList.toggle('burger_ligne_active');
    burgerMenu.children[1].children[0].classList.toggle('burger_ligne_activem');

    //for close filtre produit if it is not close
    document.querySelector('#itemFiltre').classList.add('dnone');
    document.querySelector('#filtreProduit>img').classList.remove('icon_triangle');
});

//  list filtre 

if (filtreProduit !== null) {

    filtreProduit.addEventListener('click', (event)=>{
        // console.log('tyt');
        document.querySelector('#itemFiltre').classList.toggle('dnone');
        document.querySelector('#filtreProduit>img').classList.toggle('icon_triangle');
    });

    filtrePrix.addEventListener('click', (event)=>{
        document.querySelector('#itemPrix').classList.toggle('dnone');
        document.querySelector('#filtrePrix>img').classList.toggle('icon_triangle');
    });

    filtreCategorie.addEventListener('click', (event)=>{
        document.querySelector('#itemCategorie').classList.toggle('dnone');
        document.querySelector('#filtreCategorie>img').classList.toggle('icon_triangle');
    });

    filtreCouleur.addEventListener('click', (event)=>{
        document.querySelector('#itemCouleur').classList.toggle('dnone');
        document.querySelector('#filtreCouleur>img').classList.toggle('icon_triangle');
    });

    prix.addEventListener('input', (event)=>{
        document.querySelector('.prix_affiche').textContent = prix.value;
    });

    filtreFleur.addEventListener('click', (event)=>{
        document.querySelector('#filtreFleur>img').classList.toggle('icon_triangle');
        document.querySelector('#itemFleur').classList.toggle('dnone');
    });
}

//   for notre Livraison move and remove block

idLivraison.addEventListener('click', (event)=>{
    document.querySelector('#notrelivraison').classList.toggle('notrelivraison_active');
});

document.querySelector('#livraisonVilleFermer').addEventListener('click', (event)=>{
    document.querySelector('#notrelivraison').classList.toggle('notrelivraison_active');
});

//  pour chercher les villes des livraison

inputSearchVille.addEventListener("input", (e) => {
    let str = e.target.value;
    let villes = document.querySelectorAll('.item_ville');
    for (let ville of villes) {
        if (ville.textContent.toLowerCase().match(str.toLowerCase())){
            ville.classList.remove("dnone");
            // ville.style.display = 'flex';
        } else {
            ville.classList.add("dnone");
            // ville.style.display = 'none';
        }
    }
});

//  pour carusel 


if (document.querySelector(".list_carusel") !== null) {
    let carrousel = document.querySelector(".list_carusel");
    let arrowLeft = document.querySelector(".chevron_left");
    let arrowRight = document.querySelector(".chevron_right");
    let arr = [];
    // console.log(carrousel.children);


    arrowLeft.addEventListener("click", (event) => {
    arr = Array.from(carrousel.children);
    let elem = arr[0].cloneNode(true);
    carrousel.append(elem);
    carrousel.children[0].remove();
    });

    arrowRight.addEventListener("click", (event) => {
    arr = Array.from(carrousel.children);
    let elem = arr[arr.length - 1].cloneNode(true);
    carrousel.children[0].before(elem);
    carrousel.children[arr.length].remove();
    });
}


// pour ajouter de produitOffre

if (document.querySelector("#produitOffre") !== null) {
        let btnProduitOffre = document.querySelector("#produitOffre");
    // let blockProduitOffre = document.querySelector("#blockProduitOffre");
    let blockProduitOffre = document.querySelector("#blockProduitOffre>section>div");
    // console.log(blockProduitOffre);
    async function jsonFetch(pathUrl, method = "GET", dataForBody) {
        const response = await fetch(pathUrl, {
        method: method,
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(dataForBody),
        })
        if (response.ok) {
        //retourne les données afin de pouvoir les stocké dans une variable
        return await response.json()
        }
        //Si status au dessus de 400
        return Promise.reject(response)
    }


    btnProduitOffre.addEventListener("click", (event)=>{
        // console.log(btnProduitOffre);
        jsonFetch("http://lafleurmvc2/getPlusProduitOffre")
        .then((jsonData) => {
        //Utilisation des données ici
        // console.log(jsonData);
        let str = '';
        for (let produit of jsonData) {
                // console.log(produit['photos'][0]['img_url']);
                str += getViewCarte(produit['idproduit'], produit['photos'][0]['img_url'], produit['nom'], produit['prix_unite'], produit['disponible']);
            
            }
        blockProduitOffre.insertAdjacentHTML('beforeend',str);

        })
        .catch((err) => {
        //affiche les code 400+ ici
        console.log(err)
        })
    });


    function getViewCarte(idProduit, imgProduit, nomProduit, prixProduit, dispoProduit) {
        let carteHtml = '';
        carteHtml += '<div class="carte marg5 marg20top"><a href="details?id='+idProduit+'">';
        carteHtml += '<img class="img_carte" src="public/imgs/fleurs/'+imgProduit+'" title=" details"></a>';
        carteHtml += '<p class="title_carte pd24w600">'+nomProduit+'</p>';
        carteHtml += '<div class="footer_carte"><span class="prix_carte int20w400">'+prixProduit+'</span>';
        carteHtml += '<button class="btn_ajouter int20w400">'+dispoProduit+'</button></div></div>';
        return carteHtml;
    }
}



