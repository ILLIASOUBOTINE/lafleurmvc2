// if (window.innerWidth > 841) {
//     document.querySelectorAll('.listFiltre')[0].remove();
//     document.querySelector('#filtreProduit').remove();
    
//     console.dir(document.querySelectorAll('.listFiltre'));
// } else {
//     console.dir(document.querySelectorAll('.listFiltre'));
// }
 
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

console.dir(filtreProduit);


 //update page 
// window.addEventListener('resize', function() {
//     location.reload();
// });





//  burger menue  

burgerMenu.addEventListener('click', (event)=>{
    dropMenu.classList.toggle('drop_menu_active');
    burgerMenu.children[0].classList.toggle('dhidden');
    burgerMenu.children[2].classList.toggle('dhidden');
    burgerMenu.children[1].classList.toggle('burger_ligne_active');
    burgerMenu.children[1].children[0].classList.toggle('burger_ligne_activem');

    //for close filtre produit if it is not close
    document.querySelector('#itemFiltre').classList.add('dnone');
  
});

//  list filtre 



filtreProduit.addEventListener('click', (event)=>{
    console.log('tyt');
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

