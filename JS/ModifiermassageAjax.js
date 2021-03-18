
var input = document.getElementById('selectMassage');
input.addEventListener('change',afficherMassage)
var inputNom = document.getElementById('nomMassage');
var inputDescription = document.getElementById('descriptionMassage');

function afficherMassage(e){
    var select = e.target.value
    var req = new XMLHttpRequest();
    req.onreadystatechange = () => {
        if(req.readyState === 4){
            if(req.status === 200){
                console.log(req)
                var massage = JSON.parse(req.responseText)
                inputNom.value = massage['TYPE_MASSAGE']
                inputDescription.value = massage['DESCRIPTION_MASSAGE']
            }
        }
    }
    req.open('GET','requeteAjaxModifSoins.php?nom='+select,false);
    req.send()
}