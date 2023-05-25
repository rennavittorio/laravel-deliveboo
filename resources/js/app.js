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
let restAddress = '';
let restVat = '';


//check psw && pswConf inputs
document.getElementById("password").addEventListener("blur", ()=>{
    psw = document.getElementById('password');
    console.log(psw.value.length)
    if(psw.value.length === 0){
        psw.className = ('form-control');
    }

    if(psw.value.length < 8){
        psw.className = ('form-control border border-warning');
    } else {
        psw.className = ('form-control border border-succes');
    }
})

document.getElementById("password-confirm").addEventListener("blur", ()=>{
    pswConf = document.getElementById('password-confirm');

    if(psw.value.length === 0){
        pswConf.className = ('form-control');
    }

    if(pswConf.value.length < 8){
        pswConf.className = ('form-control border border-warning');
    } else {
        // pswConf.className = ('form-control border border-succes');
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
