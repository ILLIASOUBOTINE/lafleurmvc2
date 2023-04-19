
if(document.querySelector('.loto') !== null){

    
    let gifts = JSON.parse(document.querySelector('.jsonCadeaux').innerText);

// let gifts = [
//     {id:1, name:'gift1', photo:'public/imgs/cadeau/bouquet.png', quantite:2},
//     {id:2, name:'gift2', photo:'public/imgs/cadeau/pen.png', quantite:4},
//     {id:3, name:'gift3', photo:'public/imgs/cadeau/sac.png', quantite:8},
//     {id:4, name:'gift4', photo:'public/imgs/cadeau/rose-rouge.png', quantite:10},
// ];

let chance = 0.5;

let quantiteGifts = 0;
let numGifts = gifts.length;


for(let item of gifts){
    quantiteGifts += Number(item.quantite);
}
// console.log(gifts);
// console.log(numGifts);
// console.log(quantiteGifts);
let n = quantiteGifts/chance;
let arrLoto = new Array(n);

for (let item of gifts) {
    for (let i = 0; i < item.quantite; i++) {
        let num = Math.floor(Math.random() * n);
        
       if(arrLoto[num] === undefined) {
            arrLoto[num] = item;
            
        }else {
            i--;
        }
    }
}


// arrLoto.forEach((item,index)=>{console.log( index +' = ' + item.nom)});
// console.log(arrLoto.length);




 
        
   


    document.querySelector('#loto_item1').setAttribute('src','public/imgs/cadeau/'+gifts[0].photo);
    document.querySelector('#loto_item2').setAttribute('src','public/imgs/cadeau/'+gifts[0].photo);
    document.querySelector('#loto_item3').setAttribute('src','public/imgs/cadeau/'+gifts[0].photo);
    // console.dir(document.querySelector('#loto_item1'));

    let numChance = Math.floor(Math.random() * n);
    let timeIntervalStart;

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
    document.querySelector('#btnStart').addEventListener("click",(event)=>{
        
        document.querySelector('#btnStop').classList.remove('dnone');
        document.querySelector('#btnStart').classList.add('dnone');
        let numGift1 = 0;
        let numGift2 = 0;
        let numGift3 = 1;
        // console.log("start");
        timeIntervalStart = setInterval(()=>{
            if (numChance < n-1) {
                numChance++;
                // console.log(numChance);
            } else {
                numChance = 0;
            }

            numGift1++;
            numGift2--;
            numGift3++;
            if (numGift1 === numGifts) {
                numGift1 = 0;
            }
            if (numGift2 === -1) {
                numGift2 = numGifts-1;
            }
            if (numGift3 >= numGifts) {
                numGift3 = 0;
            }
            document.querySelector('#loto_item1').setAttribute('src','public/imgs/cadeau/'+gifts[numGift1].photo);
            document.querySelector('#loto_item2').setAttribute('src','public/imgs/cadeau/'+gifts[numGift2].photo);
            document.querySelector('#loto_item3').setAttribute('src','public/imgs/cadeau/'+gifts[numGift3].photo);
        },200)
        
        

        
          
    }); 


    document.querySelector('#btnStop').addEventListener("click",(event)=>{
        // console.log("stop");
        
        
        clearInterval(timeIntervalStart);
        document.querySelector('#btnStop').classList.add('dnone');
        document.querySelector('#btnStart').classList.add('dnone');

        if (arrLoto[numChance] === undefined) {
            // console.log('you losse');
            // document.querySelector('#btnVoirCommande').classList.remove('dnone');
            document.querySelector('.loto_title').innerText = 'Vous n\'avez pas gagné';
            jsonFetch("http://lafleurmvc2version2/essaiCadeau")
            .then((jsonData) => {
                console.log(jsonData);
                // console.log("jsonData");
            })
            .catch((err) => {
                console.log(err);
            });
        } else {
            // console.log('you win '+ arrLoto[numChance].nom);
            // document.querySelector('#btnGetCadeau').classList.remove('dnone');
           let id = arrLoto[numChance].idcadeau;
            const data = {idCadeau: id};
            jsonFetch("http://lafleurmvc2version2/setCadeau","POST", data)
                .then((jsonData) => {
                    console.log(jsonData);
                    // console.log("jsonData");
                })

                .catch((err) => {
                    console.log(err);
            });

            // document.querySelector('#btnGetCadeau').setAttribute('href','/setCadeau?idCadeau='+arrLoto[numChance].idcadeau);
            

            document.querySelector('#loto_item1').setAttribute('src','public/imgs/cadeau/'+arrLoto[numChance].photo);
            document.querySelector('#loto_item2').setAttribute('src','public/imgs/cadeau/'+arrLoto[numChance].photo);
            document.querySelector('#loto_item3').setAttribute('src','public/imgs/cadeau/'+arrLoto[numChance].photo);
            document.querySelector('.loto_title').innerText = 'Vous avez gagné '+arrLoto[numChance].nom;
        }
        document.querySelector('#btnVoirCommande').classList.remove('dnone');
        // console.log(numChance);
        

    }); 

}






