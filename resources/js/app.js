import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


let psw = '';
let pswConf = '';
document.getElementById("password").addEventListener("change", ()=>{
    psw = document.getElementById('password');
})

document.getElementById("password-confirm").addEventListener("change", ()=>{
    pswConf = document.getElementById('password-confirm');
    if(psw.value !== pswConf.value){
        psw.className += ('form-control border border-danger');
        pswConf.className += ('form-control border border-danger');
        //alert('wrong psw confirm')
    } else {
        psw.classList.remove('border-danger');
        pswConf.classList.remove('border-danger');
    }
})
