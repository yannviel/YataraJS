
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