
var mapPrixDuree = new Map();
select = document.getElementById('PrixDuree');

mapPrixDuree.set("1h","130 CHF");
mapPrixDuree.set("1h15","160 CHF");
mapPrixDuree.set("1h30","190 CHF");


let str = '<option>sélectionner une durée</option>';

mapPrixDuree.forEach((key, val) => {
    str += `<option value='${key}'>${val}</option>`

});
select.innerHTML = str;



var selectPrix = document.getElementById('PrixDuree')
selectPrix.addEventListener('change', afficherRecap)


function afficherRecap() {
    var divRecap = document.getElementById('recap')
    var selection = document.getElementById('PrixDuree')
    var texte = selection.options[selection.selectedIndex].text
    var prix = selection.options[selection.selectedIndex].value

    divRecap.innerHTML = '<h4>Récapitulatif de la commande :</h4>' +
        'qaw4'+
        '<p>'+'Durée : '+texte+'</p>' +
        '<p>'+'Prix : '+prix+'</p>'
}