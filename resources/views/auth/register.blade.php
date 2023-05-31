@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrazione nuovo utente</div>

                {{-- <div>
                    {{ dd(request()->session()) }}
                </div> --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- user form --}}
                        <h3>Dati utente</h3>
                        <div class="mb-4 row">

                            <div class="col-6">

                                <label for="name" class="col-md-4 col-form-label text-md-right required-input">Nome</label>
                                <input
                                id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                                placeholder="eg. Mario Rossi" required autocomplete="name" autofocus
                                maxlength="255"
                                >

                                <span id="register-name-error" class="message-error text-danger ps-2"></span>
    
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-6">

                                <label for="email" class="col-md-4 col-form-label text-md-right required-input">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" placeholder="eg. mario.rossi@mail.com" required autocomplete="email"
                                maxlength="255"
                                >

                                <span id="register-email-error" class="message-error text-danger ps-2"></span>
        
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                        </div>

                        <div class="mb-4 row">
                            <div class="col-6">

                                <label for="password" class="col-form-label text-md-right required-input">Nuova Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" placeholder="Inserisci una password di almeno 8 caratteri" required autocomplete="new-password"
                                maxlength="255" minlength="8"
                                >

                                <span id="register-psw-error" class="message-error text-danger ps-2"></span>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="col-6">

                                <label for="password-confirm" class="col-form-label text-md-right required-input">Conferma Nuova Password</label>
                                <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror"
                                name="password_confirmation" placeholder="Inserisci nuovamente la tua password" required autocomplete="new-password"
                                maxlength="255" minlength="8"
                                >

                                <span id="register-psw-confirm-error" class="message-error text-danger ps-2"></span>

                            </div>

                        </div>
                                                

                        {{-- restaurant form --}}
                        <h3>Dati attività</h3>
                        <div class="mb-4 row">

                            <div class="col-12 mb-4">

                                <label for="restaurant_name" class="col-md-4 col-form-label text-md-right required-input">Nome Ristorante</label>
                                <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" 
                                name="restaurant_name" value="{{ old('restaurant_name') }}" placeholder="eg. Pizzeria da Mario" required autocomplete="restaurant_name" autofocus
                                maxlength="100"
                                >

                                <span id="register-name-restaurant-error" class="message-error text-danger ps-2"></span>
    
                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="col-12 mb-2">

                                <label for="img" class="form-label required-input">Immagine</label>
                                <input type="file" class="form-control" id="url" name="img" value="">

                                <span id="register-img-error" class="message-error text-danger ps-2"></span>

                                @error('img')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                        <div class="mb-2 row">
                            <label class="form-label required-input" id="restaurant_categories_title">Categorie</label>
                            <ul class="d-flex flex-wrap gap-2">

                                @foreach ($category_ids as $category)
                                    <div class="form-check">
                                        <input 
                                        class="form-check-input categories" type="checkbox" value="{{ $category->id }}" id="{{ $category->id }}" name="categories[]"
                                        @checked( in_array($category->id, old('categories', [])) )
                                        >
                                        <label class="form-check-label" for="{{ $category->id }}" name="categories[]">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach

                            </ul>
                        </div>

                        <div class="mb-4 row">

                            <div class="col-6">

                                <label for="address" class="col-md-4 col-form-label text-md-right required-input">Indirizzo</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" placeholder="eg. Via del Mario, 15" required autocomplete="name" autofocus
                                maxlength="255"
                                >

                                <span id="register-address-error" class="message-error text-danger ps-2"></span>
    
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="col-6">

                                <label for="vat" class="col-md-4 col-form-label text-md-right required-input">P.IVA</label>
                                <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror"
                                name="vat" value="{{ old('vat') }}" placeholder="eg. 12345678900" required autocomplete="vat"
                                maxlength="13" minlength="13"
                                >

                                <span id="register-vat-error" class="message-error text-danger ps-2"></span>
        
                                @error('vat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                        </div>


                        <div class="mb-4 row">
                            <div class="">
                                <button type="submit" class="btn btn-primary" id="btn-sub">
                                    Registrati
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
/////////////////////////////////////////
//////////register form controls///////////
////////////////////////////////////////
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
if(btnSub !== null){
    btnSub.disabled = true;
}

//check name
document.getElementById("name").addEventListener("blur", ()=>{
    name = document.getElementById('name');
    let registerNameError = document.getElementById('register-name-error');
    if(name.value.length === 0){
        name.className = ('form-control border border-danger');
        nameCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
        registerNameError.textContent = 'Inserisci il nome...';
    } else {
        name.className = ('form-control border border-success');
        nameCheck = true;
        registerNameError.textContent = '';
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})


//check mail
document.getElementById("email").addEventListener("blur", ()=>{
    mail = document.getElementById('email');
    let registerEmailError = document.getElementById('register-email-error');
    if(mail.value.length === 0){
        mail.className = ('form-control border border-danger');
        mailCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
        registerEmailError.textContent = 'Inserisci la mail...'
    } else {
        mail.className = ('form-control border border-success');
        mailCheck = true;
        registerEmailError.textContent = '';
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})


//check psw && pswConf inputs
document.getElementById("password").addEventListener("blur", ()=>{
    psw = document.getElementById('password');
    let registerPswError = document.getElementById('register-psw-error');
    console.log(psw.value.length)
    if(psw.value.length === 0){
        psw.className = ('form-control border border-danger');
        registerPswError.textContent = 'Inserisci la password...';
    }

    if(psw.value.length >= 1 && psw.value.length < 8){
        psw.className = ('form-control border border-warning');
        registerPswError.textContent = 'Deve includere almeno 8 caratteri';
    } 

    if(psw.value.length >= 8){
        psw.className = ('form-control border border-success');
        registerPswError.textContent = '';
    }
})

document.getElementById("password-confirm").addEventListener("blur", ()=>{
    pswConf = document.getElementById('password-confirm');
    let registerPswConfirmError = document.getElementById('register-psw-confirm-error');
    if(psw.value.length === 0){
        pswConf.className = ('form-control border border-danger');
        pswCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
        registerPswConfirmError.textContent = 'Inserisci la conferma password...';
    }

    if(pswConf.value.length >= 1 && pswConf.value.length < 8){
        pswConf.className = ('form-control border border-warning');
        pswCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
        registerPswConfirmError.textContent = 'Deve includere almeno 8 caratteri';
    } 

    if(pswConf.value.length >= 8){
        if(psw.value !== pswConf.value){
            psw.className = ('form-control border border-danger');
            pswConf.className = ('form-control border border-danger');
            pswCheck = false;
            registerPswConfirmError.textContent = 'La password non corrisponde';
            //alert('wrong psw confirm')
        } else {
            psw.className = ('form-control border border-success');
            pswConf.className = ('form-control border border-success');
            pswCheck = true;
            registerPswConfirmError.textContent = '';
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
    let registerNamerestaurantError = document.getElementById('register-name-restaurant-error');
    if(restName.value.length === 0){
        restName.className = ('form-control border border-danger');
        restNameCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
        registerNamerestaurantError.textContent = 'Inserisci il nome del ristorante...';
    } else {
        restName.className = ('form-control border border-success');
        restNameCheck = true;
        registerNamerestaurantError.textContent = '';
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})

//check restImg
document.getElementById("url").addEventListener("blur", ()=>{
    restImg = document.getElementById('url');
    let registerImgError = document.getElementById('register-img-error');
    if(restImg.value.length === 0){
        restImg.className = ('form-control border border-danger');
        restImgCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
        registerImgError.textContent = 'Inserisci l\'immagine...';
    } else {
        restImg.className = ('form-control border border-success');
        restImgCheck = true;
        registerImgError.textContent = '';
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
    let registerAddressError = document.getElementById('register-address-error');
    if(restAddress.value.length === 0){
        restAddress.className = ('form-control border border-danger');
        restAddressCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
        registerAddressError.textContent = 'Inserisci l\'indirizzo...';
    } else {
        restAddress.className = ('form-control border border-success');
        restAddressCheck = true;
        registerAddressError.textContent = '';
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})

//check restVat
document.getElementById("vat").addEventListener("blur", ()=>{
    restVat = document.getElementById('vat');
    let registerVatError = document.getElementById('register-vat-error');
    if(restVat.value.length === 0){
        restVat.className = ('form-control border border-danger');
        restVatCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
        registerVatError.textContent = 'Inserisci la Partita Iva...';
    } else if(restVat.value.length < 13) {
        restVat.className = ('form-control border border-warning');
        restVatCheck = false;
        btnSub = document.getElementById('btn-sub');
        btnSub.disabled = true;
        registerVatError.textContent = 'Deve contenere 13 caratteri';
    } else {
        restVat.className = ('form-control border border-success');
        restVatCheck = true;
        registerVatError.textContent = '';
        if(nameCheck && mailCheck && pswCheck && restNameCheck && restImgCheck && restAddressCheck && restVatCheck){
            btnSub = document.getElementById('btn-sub');
            btnSub.disabled = false;
        }
    }
})
</script>
@endsection
