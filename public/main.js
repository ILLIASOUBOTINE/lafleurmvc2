//update page
window.addEventListener("resize", function () {
 
  //  location.reload();
  
});

if (window.innerWidth > 841) {
  document.querySelectorAll(".listFiltre")[0].remove();
  document.querySelector("#filtreProduit").remove();
}

const burgerMenu = document.querySelector(".burger_menu");
const dropMenu = document.querySelector(".drop_menu");
const itemdropMenu = document.querySelector(".itemdrop_menu");
const listFiltre = document.querySelector(".listFiltre");
const filtreProduit = document.querySelector("#filtreProduit");

const filtrePrix = document.querySelector("#filtrePrix");
const filtreFleur = document.querySelector("#filtreFleur");
const filtreCategorie = document.querySelector("#filtreCategorie");
const filtreCouleur = document.querySelector("#filtreCouleur");
const idLivraison = document.querySelector(".idlivraison");
const prix = document.querySelector("#prix");
const inputSearchVille = document.querySelector("#inputSearchVille");




if (document.title == "Commande") {
 
  document.getElementById("panier").remove();

  if (document.getElementById("panier") !== null) {
    document.getElementById("panier").classList.remove("panier");
    document.getElementById("panier").classList.add("panier_commande");
    document.getElementById("panierFermer").remove();
    document.getElementById("panierCommander").remove();
  }
}

let produitsPanier;

let prixTotalePanier = 0;
const panierList = document.querySelector(".panier_list");
if (document.querySelector(".panier_list") !== null) {
  if (sessionStorage.getItem("produitsPanier") == null) {
    produitsPanier = [];
    
    
  } else {
    produitsPanier = JSON.parse(sessionStorage.getItem("produitsPanier"));
      produitsPanier.forEach((produit) => {
      
      let prixProduitTotal1 = Number(produit.prixProduitTotal).toFixed(2);
      let str = getViewItemPanier(
        produit.idProduit,
        produit.imgProduit,
        produit.nomProduit,
        produit.prixProduit,
        produit.quantite,
        prixProduitTotal1
      );
      panierList.insertAdjacentHTML("beforeend", str);
      prixTotalePanier += produit.prixProduit * produit.quantite;
     
    });
    
    // pour prixtotalePanier
    document.querySelector("#panierTotale").textContent =
      "Total: " + prixTotalePanier.toFixed(2) + "$";
  }
}



//  burger menue

burgerMenu.addEventListener("click", (event) => {
  dropMenu.classList.toggle("drop_menu_active");
  burgerMenu.children[0].classList.toggle("dhidden");
  burgerMenu.children[2].classList.toggle("dhidden");
  burgerMenu.children[1].classList.toggle("burger_ligne_active");
  burgerMenu.children[1].children[0].classList.toggle("burger_ligne_activem");

  //for close filtre produit if it is not close
  document.querySelector("#itemFiltre").classList.add("dnone");
  document.querySelector("#filtreProduit>img").classList.remove("icon_triangle");
});

//  list filtre

if (filtreProduit !== null) {
  filtreProduit.addEventListener("click", (event) => {
    
    document.querySelector("#itemFiltre").classList.toggle("dnone");
    document
      .querySelector("#filtreProduit>img")
      .classList.toggle("icon_triangle");
  });

  filtrePrix.addEventListener("click", (event) => {
    document.querySelector("#itemPrix").classList.toggle("dnone");
    document.querySelector("#filtrePrix>img").classList.toggle("icon_triangle");
  });

  filtreCategorie.addEventListener("click", (event) => {
    document.querySelector("#itemCategorie").classList.toggle("dnone");
    document
      .querySelector("#filtreCategorie>img")
      .classList.toggle("icon_triangle");
  });

  filtreCouleur.addEventListener("click", (event) => {
    document.querySelector("#itemCouleur").classList.toggle("dnone");
    document
      .querySelector("#filtreCouleur>img")
      .classList.toggle("icon_triangle");
  });

  prix.addEventListener("input", (event) => {
    document.querySelector(".prix_affiche").textContent = prix.value;
  });

  filtreFleur.addEventListener("click", (event) => {
    document
      .querySelector("#filtreFleur>img")
      .classList.toggle("icon_triangle");
    document.querySelector("#itemFleur").classList.toggle("dnone");
  });
}

//   for notre Livraison move and remove block

idLivraison.addEventListener("click", (event) => {
  document
    .querySelector("#notrelivraison")
    .classList.toggle("notrelivraison_active");
});

document
  .querySelector("#livraisonVilleFermer")
  .addEventListener("click", (event) => {
    document
      .querySelector("#notrelivraison")
      .classList.toggle("notrelivraison_active");
  });

//   for panier move and remove block
if (document.querySelector("#panierFermer") !== null) {
  document.querySelector(".idpanier").addEventListener("click", (event) => {
    if (panierList.children.length !== 0) {
      document.querySelector("#panier").classList.toggle("panier_active");
    }
  });

  document.querySelector("#panierFermer").addEventListener("click", (event) => {
    document.querySelector("#panier").classList.toggle("panier_active");
  });
}

//  pour chercher les villes des livraison

inputSearchVille.addEventListener("input", (e) => {
  let str = e.target.value;
  let villes = document.querySelectorAll(".item_ville");
  for (let ville of villes) {
    if (ville.textContent.toLowerCase().match(str.toLowerCase())) {
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
  
  let blockProduitOffre = document.querySelector(
    "#blockProduitOffre>section>div"
  );
 
  async function jsonFetch(pathUrl, method = "GET", dataForBody) {
    const response = await fetch(pathUrl, {
      method: method,
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(dataForBody),
    });
    if (response.ok) {
      //retourne les données afin de pouvoir les stocké dans une variable
      return await response.json();
    }
    //Si status au dessus de 400
    return Promise.reject(response);
  }

  btnProduitOffre.addEventListener("click", (event) => {
    
    jsonFetch("https://soubotine.needemand.com/realisations/lafleurmvc2/getPlusProduitOffre")
      .then((jsonData) => {
        //Utilisation des données ici
        
        let str = "";
        for (let produit of jsonData) {
         
          str += getViewCarte(
            produit["idproduit"],
            produit["photos"][0]["img_url"],
            produit["nom"],
            produit["prix_unite"],
            produit["disponible"]
          );
        }
        blockProduitOffre.insertAdjacentHTML("beforeend", str);
      })
      .catch((err) => {
        //affiche les code 400+ ici
        
      });
  });
}

function getViewCarte(
  idProduit,
  imgProduit,
  nomProduit,
  prixProduit,
  dispoProduit
) {
  let carteHtml = "";
  carteHtml +=
    '<div class="carte marg5 marg20top"><a href="./details?id=' +
    idProduit +
    '">';
  carteHtml +=
    '<img class="img_carte" src="public/imgs/fleurs/' +
    imgProduit +
    '" title=" details"></a>';
  carteHtml += '<p class="title_carte pd24w600">' + nomProduit + "</p>";
  carteHtml +=
    '<div class="footer_carte"><span class="prix_carte int20w400">' +
    prixProduit +
    "</span>";
  carteHtml +=
    '<button class="btn_ajouter int20w400" id="idBtnAjouter' +
    idProduit +
    '">' +
    dispoProduit +
    "</button></div></div>";
  return carteHtml;
}

// pour panier
document.querySelector("main").addEventListener("click", (event) => {
  if (
    event.target.classList.contains("btn_ajouter") &&
    event.target.innerText === "Ajouter"
  ) {
   
    let idProduit = event.target.id.replace("idBtnAjouter", "");
    

    if (
      produitsPanier.findIndex((produit) => produit.idProduit === idProduit) ==
      -1
    ) {
      let produit = JSON.parse(event.target.dataset.message);
      

      let nomProduit = produit.nomProduit;
      let imgProduit = produit.imgProduit;
      let prixProduit = produit.prixProduit.toFixed(2);
      let prixProduitTotal = prixProduit;
      let quantite = 1;

     
      let str = getViewItemPanier(
        idProduit,
        imgProduit,
        nomProduit,
        prixProduit,
        quantite,
        prixProduitTotal
      );

      panierList.insertAdjacentHTML("beforeend", str);

      let obj = {
        idProduit: idProduit,
        imgProduit: imgProduit,
        nomProduit: nomProduit,
        prixProduit: prixProduit,
        prixProduitTotal: prixProduitTotal,
        quantite: 1,
      };
      

      produitsPanier.push(obj);
      let produitsPanierSerialized = JSON.stringify(produitsPanier);
      sessionStorage.setItem("produitsPanier", produitsPanierSerialized);

      // pour prixtotalePanier
      getPrixTotalPanier(produitsPanier);
      
    }
  }
});

//  ajouter et supprimer quantite produit
if (panierList !== null) {
  panierList.addEventListener("click", (event) => {
    if (event.target.classList.contains("panier_item_plus")) {
      let itemPanier =
        event.target.parentElement.parentElement.parentElement.parentElement;
      let idItemPanier = itemPanier.id.replace("idItemPanier", "");

    

      produitsPanier.map((produit) => {
        if (produit.idProduit === idItemPanier) {
          produit.quantite++;
          produit.prixProduitTotal = produit.quantite * produit.prixProduit;

          event.target.previousElementSibling.textContent++;
          event.target.parentElement.nextElementSibling.textContent =
            "Total: " + produit.prixProduitTotal.toFixed(2) + "$";
        }
      });

      sessionStorage.setItem("produitsPanier", JSON.stringify(produitsPanier));

      // pour prixtotalePanier
      getPrixTotalPanier(produitsPanier);
     ;
    }

    if (event.target.classList.contains("panier_item_minus")) {
      let itemPanier =
        event.target.parentElement.parentElement.parentElement.parentElement;
      let idItemPanier = itemPanier.id.replace("idItemPanier", "");

      if (event.target.nextElementSibling.textContent > 1) {
       
        produitsPanier.map((produit) => {
          if (produit.idProduit === idItemPanier) {
            produit.quantite--;
            produit.prixProduitTotal = produit.quantite * produit.prixProduit;

            event.target.nextElementSibling.textContent--;
            event.target.parentElement.nextElementSibling.textContent =
              "Total: " + produit.prixProduitTotal.toFixed(2) + "$";
          }
        });

        sessionStorage.setItem(
          "produitsPanier",
          JSON.stringify(produitsPanier)
        );

        // pour prixtotalePanier
        getPrixTotalPanier(produitsPanier);
        
      } else if (event.target.nextElementSibling.textContent == 1) {
        let itemPanier =
          event.target.parentElement.parentElement.parentElement.parentElement;
        itemPanier.remove();

        let idItemPanier = itemPanier.id.replace("idItemPanier", "");

        let index = produitsPanier.findIndex(
          (produit) => produit.idProduit == idItemPanier
        );

        if (index !== -1) {
          produitsPanier.splice(index, 1);
        }
        
        sessionStorage.setItem(
          "produitsPanier",
          JSON.stringify(produitsPanier)
        );

        // pour prixtotalePanier
        getPrixTotalPanier(produitsPanier);
       
      }
      // pour la page de commande si le panier vide
      if (produitsPanier.length === 0 && document.title == "Commande") {
        document.querySelector("#panier").remove();
        window.location.pathname = "realisations/lafleurmvc2/index";
      }

      // pour cacher le panier si il est vide
      
      if (produitsPanier.length === 0) {
        document.querySelector("#panier").classList.remove("panier_active");
      }
    }
  });
}

// pour creer le element de panier. return le string html
function getViewItemPanier(
  idProduit,
  imgProduit,
  nomProduit,
  prixProduit,
  quantite,
  prixProduitTotal
) {
  let itemPanierHtml = "";
  itemPanierHtml +=
    '<div class="item_panier" id="idItemPanier' +
    idProduit +
    '"><h4 class="int20w500">' +
    nomProduit +
    "</h4>";
  itemPanierHtml +=
    '<div class="item_panier_body"><img src="' + imgProduit + '" alt="">';
  itemPanierHtml +=
    '<div class="panier_details"><p class="panier_prix_unit int14w500">' +
    prixProduit +
    "$/unité</p>";
  itemPanierHtml +=
    '<div class="panier_countre"><img class="panier_item_minus cursorscall20" src="public/imgs/general/minus.svg" alt=""><span class="int20w500">' +
    quantite +
    "</span>";
  itemPanierHtml +=
    '<img class="panier_item_plus cursorscall20" src="public/imgs/general/plus.svg" alt=""></div><p class="panier_prix_total int14w500">' +
    "Total: " +
    prixProduitTotal +
    "$" +
    "</p> </div></div></div>";
  return itemPanierHtml;
}

// pour calculer prixtotalePanier et remetre le resultate dans le html
function getPrixTotalPanier(produitsPanier) {
  let prixTotalePanier = 0;
  produitsPanier.forEach((produit) => {
    prixTotalePanier += produit.prixProduit * produit.quantite;
  });
  document.querySelector("#panierTotale").textContent =
    "Total: " + prixTotalePanier.toFixed(2) + "$";
}



// pour envoye les informations de panier a la serveur
if (document.querySelector("#panierValider") !== null) {
  document
    .querySelector("#panierValider")
    .addEventListener("click", (event) => {
      event.preventDefault();
      let objs = [];
      produitsPanier.forEach((produit) => {
        let obj = { id: Number(produit.idProduit), quantite: produit.quantite };
        objs.push(obj);
      });

      let str = JSON.stringify(objs);

      document.querySelector("#dataPanier").value = str;
      event.target.form.submit();
    });
}

// pour metre le coleur sur etape de commande

if (document.querySelector(".titre_commande_etape") !== null) {
  etaps = document.querySelectorAll(".item_etape_nom");
 
  etaps.forEach((element) => {
   
    if (
      element.textContent ==
      document.querySelector(".titre_commande_etape").textContent
    ) {
     
      element.previousElementSibling.classList.add("item_etape_cercle_activ");
    }
  });
}



// pour vider le panier apres le paiement
if(document.querySelector('.isPanierVide') !== null){
  let isPanierVide  = (document.querySelector('.isPanierVide').innerText);
 
  if (isPanierVide == 1) {
    sessionStorage.removeItem('produitsPanier');
     
  }
}