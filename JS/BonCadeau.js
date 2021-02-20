
//création de la map source : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Map
var mapPrixDuree = new Map();
select = document.getElementById('PrixDuree');

mapPrixDuree.set("1h","130 CHF");
mapPrixDuree.set("1h15","160 CHF");
mapPrixDuree.set("1h30","190 CHF");

// boucle permettant de récupéréer les valeurs de la map et les afficher dans le select source : https://stackoverflow.com/questions/55921971/how-to-get-a-map-array-in-javascript-to-print-in-a-dropdown-list
let str = '<option>sélectionner une durée</option>';

mapPrixDuree.forEach((key, val) => {
    str += `<option value='${key}'>${val}</option>`

});
select.innerHTML = str;


// fonction qui crée une div recap en fonction de la valeur sélectionner dans le select
function afficherRecap() {
    var divRecap = document.getElementById('recap')
    var selection = document.getElementById('PrixDuree')
    var texte = selection.options[selection.selectedIndex].text
    var prix = selection.options[selection.selectedIndex].value

    divRecap.innerHTML = '<h4>Récapitulatif de la commande :</h4>' +
        '<p>'+'Durée : '+texte+'</p>' +
        '<p>'+'Prix : '+prix+'</p>'
}
// affichage de la div source : Gonzalo
var selectPrix = document.getElementById('PrixDuree')
selectPrix.addEventListener('change', afficherRecap)
