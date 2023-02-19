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

const panierList = document.querySelector('.panier_list');
let arrItemIdProduit = [];

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


//   for panier move and remove block

    document.querySelector('.idpanier').addEventListener('click', (event)=>{
        if (panierList.children.length !== 0) {
            document.querySelector('#panier').classList.toggle('panier_active');
        }
    });

    document.querySelector('#panierFermer').addEventListener('click', (event)=>{
        document.querySelector('#panier').classList.toggle('panier_active');
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

}
    function getViewCarte(idProduit, imgProduit, nomProduit, prixProduit, dispoProduit) {
        let carteHtml = '';
        carteHtml += '<div class="carte marg5 marg20top"><a href="details?id='+idProduit+'">';
        carteHtml += '<img class="img_carte" src="public/imgs/fleurs/'+imgProduit+'" title=" details"></a>';
        carteHtml += '<p class="title_carte pd24w600">'+nomProduit+'</p>';
        carteHtml += '<div class="footer_carte"><span class="prix_carte int20w400">'+prixProduit+'</span>';
        carteHtml += '<button class="btn_ajouter int20w400" id="idBtnAjouter'+idProduit+'">'+dispoProduit+'</button></div></div>';
        return carteHtml;
    }


// pour panier


document.querySelector('main').addEventListener('click',(event)=>{
    if (event.target.classList.contains('btn_ajouter') && event.target.innerText === 'Ajouter') {
        console.dir(event.target);
        let idProduit = event.target.id.replace('idBtnAjouter','');
        if (!arrItemIdProduit.includes(idProduit)) {
            arrItemIdProduit.push(idProduit);
            let produit = event.target.parentElement.parentElement;
            // let idProduit = produit.children[0].href;
            let nomProduit = produit.children[1].innerText;
            let imgProduit = produit.children[0].children[0].src;
            let prixProduit = produit.children[2].children[0].innerText;
            let prixProduitTotal = prixProduit;

            console.log(idProduit,nomProduit,imgProduit,prixProduit);
        
            let str = getViewItemPanier(idProduit, imgProduit, nomProduit, prixProduit,  prixProduitTotal);

            panierList.insertAdjacentHTML('beforeend',str);

          let obj = {idProduit: idProduit, imgProduit: imgProduit, nomProduit:nomProduit, prixProduit:prixProduit,  prixProduitTotal:prixProduitTotal, quantite:1};
          let  objSerialized = JSON.stringify(obj);
          sessionStorage.setItem('produit'+idProduit, objSerialized);
        }
        console.log(arrItemIdProduit);
    }
})

//  ajouter et supprimer quantite produit
panierList.addEventListener('click',(event)=>{
    

    if (event.target.classList.contains('panier_item_plus')){
        let itemPanier = event.target.parentElement.parentElement.parentElement.parentElement;
        let idItemPanier = itemPanier.id.replace('idItemPanier','');

       let count = ++event.target.previousElementSibling.textContent;
        event.target.parentElement.nextElementSibling.textContent = count*event.target.parentElement.previousElementSibling.textContent;
       
        let  objSerialized = sessionStorage.getItem('produit'+idItemPanier);
        let obj = JSON.parse(objSerialized);
        obj.quantite = count;
        obj.prixProduitTotal = count*event.target.parentElement.previousElementSibling.textContent;
        sessionStorage.setItem('produit'+idItemPanier, JSON.stringify(obj));

    }

    if (event.target.classList.contains('panier_item_minus')){
        let itemPanier = event.target.parentElement.parentElement.parentElement.parentElement;
        let idItemPanier = itemPanier.id.replace('idItemPanier','');

        if (event.target.nextElementSibling.textContent > 1) {
            let count = --event.target.nextElementSibling.textContent;
            event.target.parentElement.nextElementSibling.textContent = count*event.target.parentElement.previousElementSibling.textContent;
        
            let  objSerialized = sessionStorage.getItem('produit'+idItemPanier);
            let obj = JSON.parse(objSerialized);
            obj.quantite = count;
            obj.prixProduitTotal = count*event.target.parentElement.previousElementSibling.textContent;
            sessionStorage.setItem('produit'+idItemPanier, JSON.stringify(obj));

        }else if(event.target.nextElementSibling.textContent == 1){
            let itemPanier = event.target.parentElement.parentElement.parentElement.parentElement;
            itemPanier.remove(); 
           
            let idItemPanier = itemPanier.id.replace('idItemPanier','');
            let index = arrItemIdProduit.indexOf(idItemPanier);
            if (index !== -1) {
                arrItemIdProduit.splice(index,1);
            }
        }
        if ( arrItemIdProduit.length === 0) {
            document.querySelector('#panier').classList.remove('panier_active'); 
        }
    }
})

function getViewItemPanier(idProduit, imgProduit, nomProduit, prixProduit, prixProduitTotal) {
    let itemPanierHtml = '';
    itemPanierHtml += '<div class="item_panier" id="idItemPanier'+idProduit+'"><h4 class="int20w500">'+nomProduit+'</h4>';
    itemPanierHtml += '<div class="item_panier_body"><img src="'+imgProduit+'" alt="">';
    itemPanierHtml += '<div class="panier_details"><p class="panier_prix_unit int14w500">'+prixProduit+'</p>';
    itemPanierHtml += '<div class="panier_countre"><img class="panier_item_minus" src="public/imgs/general/minus.svg" alt=""><span class="int20w500">'+1+'</span>';
    itemPanierHtml += '<img class="panier_item_plus" src="public/imgs/general/plus.svg" alt=""></div><p class="panier_prix_total int14w500">'+prixProduitTotal+'</p> </div></div></div>';
    return itemPanierHtml;
}

console.log(sessionStorage);