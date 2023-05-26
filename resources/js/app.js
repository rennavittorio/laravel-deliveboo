import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//register form
let name = '';
let mail = '';

let psw = '';
let pswConf = '';

let restName = '';
let restImg = '';

let restCategories = [];
let restCategoriesChecked = [];

let restAddress = '';
let restVat = '';

//check name
document.getElementById("name").addEventListener("blur", ()=>{
    name = document.getElementById('name');
    if(name.value.length === 0){
        name.className = ('form-control border border-danger');
    } else {
        name.className = ('form-control border border-success');
    }
})


//check mail
document.getElementById("email").addEventListener("blur", ()=>{
    mail = document.getElementById('email');
    if(mail.value.length === 0){
        mail.className = ('form-control border border-danger');
    } else {
        mail.className = ('form-control border border-success');
    }
})


//check psw && pswConf inputs
document.getElementById("password").addEventListener("blur", ()=>{
    psw = document.getElementById('password');
    console.log(psw.value.length)
    if(psw.value.length === 0){
        psw.className = ('form-control border border-danger');
    }

    if(psw.value.length >= 1 && psw.value.length < 8){
        psw.className = ('form-control border border-warning');
    } 

    if(psw.value.length >= 8){
        psw.className = ('form-control border border-success');
    }
})

document.getElementById("password-confirm").addEventListener("blur", ()=>{
    pswConf = document.getElementById('password-confirm');

    if(psw.value.length === 0){
        pswConf.className = ('form-control border border-danger');
    }

    if(pswConf.value.length >= 1 && pswConf.value.length < 8){
        pswConf.className = ('form-control border border-warning');
    } 

    if(pswConf.value.length >= 8){
        if(psw.value !== pswConf.value){
            psw.className = ('form-control border border-danger');
            pswConf.className = ('form-control border border-danger');
            //alert('wrong psw confirm')
        } else {
            psw.className = ('form-control border border-success');
            pswConf.className = ('form-control border border-success');
        }
    }
    

})

//check restName
document.getElementById("restaurant_name").addEventListener("blur", ()=>{
    restName = document.getElementById('restaurant_name');
    if(restName.value.length === 0){
        restName.className = ('form-control border border-danger');
    } else {
        restName.className = ('form-control border border-success');
    }
})

//check restImg
document.getElementById("url").addEventListener("blur", ()=>{
    restImg = document.getElementById('url');
    if(restImg.value.length === 0){
        restImg.className = ('form-control border border-danger');
    } else {
        restImg.className = ('form-control border border-success');
    }
})

//check restCategories
// restCategories = document.getElementsByClassName("categories");
// for(let i = 0; i < restCategories.length; i++){

//     restCategories[i].addEventListener('change', ()=>{

//         if(restCategoriesChecked.includes(restCategories[i])){

//         }
        
//     })


// }

//check restAddress
document.getElementById("address").addEventListener("blur", ()=>{
    restAddress = document.getElementById('address');
    if(restAddress.value.length === 0){
        restAddress.className = ('form-control border border-danger');
    } else {
        restAddress.className = ('form-control border border-success');
    }
})

//check restVat
document.getElementById("vat").addEventListener("blur", ()=>{
    restVat = document.getElementById('vat');
    if(restVat.value.length === 0){
        restVat.className = ('form-control border border-danger');
    } else if(restVat.value.length < 13) {
        restVat.className = ('form-control border border-warning');
    } else {
        restVat.className = ('form-control border border-success');
    }
})
