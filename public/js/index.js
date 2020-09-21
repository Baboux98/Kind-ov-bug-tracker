let inputElts = document.querySelectorAll('.form-control');
let forms = document.querySelectorAll('form');

for (form of forms)
{
    form.setAttribute("enctype", "multipart/form-data");
   
    console.log(form);
}


for (inputElt of inputElts)
{
    inputElt.setAttribute("pattern", "^[A-Za-z0-9'àùüäïöûâôîéèê ]*[A-Za-z0-9'àùüäïöûâôîéèê][A-Za-z0-9'àùüäïöûâôîéèê ]*$");
   
    inputElt.setAttribute("title", "seulement les chiffres et les lettres");
    console.log(inputElt);
}

$(document).ready(function()
{
    $('.toast').toast('show');p
})
