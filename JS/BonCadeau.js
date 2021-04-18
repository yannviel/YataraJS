
//création de la map source : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Map
var mapPrixDuree = new Map();
select = document.getElementById('PrixDuree');

mapPrixDuree.set("1h","130 CHF");
mapPrixDuree.set("1h15","160 CHF");
mapPrixDuree.set("1h30","190 CHF");

// boucle permettant de récupérer les valeurs de la map et les afficher dans le select source : https://stackoverflow.com/questions/55921971/how-to-get-a-map-array-in-javascript-to-print-in-a-dropdown-list
let str = '<option>sélectionner une durée</option>';

mapPrixDuree.forEach((key, val) => {
    str += `<option value='${key}'>${val}</option>`

});
select.innerHTML = str;


// fonction qui crée des éléments H4 et p dans la div recap en fonction de la valeur sélectionner dans le select
var afficherRecap =  function () {
    var divRecap = document.getElementById('recap')
    var selection = document.getElementById('PrixDuree')
    var texte = selection.options[selection.selectedIndex].text
    var prix = selection.options[selection.selectedIndex].value
    var h4Recap = document.getElementById("h4Recap");
    var pDuree = document.getElementById("pDuree");
    var pPrix = document.getElementById("Pprix");
    if (!h4Recap || !pDuree || !pPrix){         //aidé par gonzalo
        h4Recap = document.createElement("h4");
        h4Recap.id = "h4Recap"
        pDuree = document.createElement("p");
        pDuree.id = "pDuree"
        pPrix = document.createElement("p");
        pPrix.id = "Pprix"
        divRecap.appendChild(h4Recap)
        divRecap.appendChild(pDuree)
        divRecap.appendChild(pPrix)
    }
    h4Recap.textContent = "Récapitulatif de la commande :"
    pDuree.textContent =  'Durée : '+texte
    pPrix.textContent =  'Prix : '+prix
}
// affichage de la div source : Gonzalo
var selectPrix = document.getElementById('PrixDuree')
selectPrix.addEventListener('change', afficherRecap)
