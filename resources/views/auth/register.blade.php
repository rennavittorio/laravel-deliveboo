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
    
                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="col-12 mb-2">

                                <label for="img" class="form-label required-input">Immagine</label>
                                <input type="file" class="form-control" id="url" name="img" value="">
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
</script>
@endsection
