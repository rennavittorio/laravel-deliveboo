import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//register form controls
let name = '';
let nameCheck = false;

let mail = '';
let mailCheck = false;

let psw = '';
let pswConf = '';
let pswCheck = false;

let restName = '';
let restNameCheck = false;

let restImg = '';
let restImgCheck = false;

let restCategories = [];
let restCategoriesChecked = [];

let restAddress = '';
let restAddressCheck = false;

let restVat = '';
let restVatCheck = false;

//submit btn, initialized as disabled
let btnSub = '';
btnSub = document.getElementById('btn-sub');
btnSub.disabled = true;

//check name
document.getElementById("name").addEventListener("blur", ()=>{
    name = document.getElementById('name');
    if(name.value.length === 0){
        name.className = ('form-control border border-danger');
        nameCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
    } else {
        name.className = ('form-control border border-success');
        nameCheck = true;
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})


//check mail
document.getElementById("email").addEventListener("blur", ()=>{
    mail = document.getElementById('email');
    if(mail.value.length === 0){
        mail.className = ('form-control border border-danger');
        mailCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
    } else {
        mail.className = ('form-control border border-success');
        mailCheck = true;
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
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
        pswCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
    }

    if(pswConf.value.length >= 1 && pswConf.value.length < 8){
        pswConf.className = ('form-control border border-warning');
        pswCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
    } 

    if(pswConf.value.length >= 8){
        if(psw.value !== pswConf.value){
            psw.className = ('form-control border border-danger');
            pswConf.className = ('form-control border border-danger');
            pswCheck = false;
            //alert('wrong psw confirm')
        } else {
            psw.className = ('form-control border border-success');
            pswConf.className = ('form-control border border-success');
            pswCheck = true;
            if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
                btnSub = document.getElementById('btn-sub');
                btnSub.disabled = false;
            }
        }
    }
    

})

//check restName
document.getElementById("restaurant_name").addEventListener("blur", ()=>{
    restName = document.getElementById('restaurant_name');
    if(restName.value.length === 0){
        restName.className = ('form-control border border-danger');
        restNameCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
    } else {
        restName.className = ('form-control border border-success');
        restNameCheck = true;
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})

//check restImg
document.getElementById("url").addEventListener("blur", ()=>{
    restImg = document.getElementById('url');
    if(restImg.value.length === 0){
        restImg.className = ('form-control border border-danger');
        restImgCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
    } else {
        restImg.className = ('form-control border border-success');
        restImgCheck = true;
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})

//TODO - fare check delle categorie
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
        restAddressCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
    } else {
        restAddress.className = ('form-control border border-success');
        restAddressCheck = true;
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})

//check restVat
document.getElementById("vat").addEventListener("blur", ()=>{
    restVat = document.getElementById('vat');
    if(restVat.value.length === 0){
        restVat.className = ('form-control border border-danger');
        restVatCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
    } else if(restVat.value.length < 13) {
        restVat.className = ('form-control border border-warning');
        restVatCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
    } else {
        restVat.className = ('form-control border border-success');
        restVatCheck = true;
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})


