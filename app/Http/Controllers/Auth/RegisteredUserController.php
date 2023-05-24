<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $category_ids = Category::all();

        return view('auth.register', compact('category_ids'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Faker $faker): RedirectResponse
    {

        //VALIDO I DATI DELLA REQUEST
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            //validazioni per restaurant input
            'restaurant_name' => ['required', 'string', 'max:100'],
            'img' => ['required', 'image'],
            'categories' => ['exists:categories,id'],
            'address' => ['required', 'max:255'],
            'vat' => ['required', 'max:13', 'min:13', 'unique:' . Restaurant::class]
        ]);

        //CREO USER
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //CREO REST
        $restaurant = new Restaurant();

        $restaurant->name = $request->restaurant_name;
        $restaurant->address = $request->address; //TODO - STANDARDIZZARE INPUT ADDRESS (con concat dati input)
        $restaurant->slug = Str::slug($restaurant->name . '-' . $restaurant->address);
        $restaurant->vat =  $request->vat;
        $restaurant->user_id = $user->id;

        if ($request->hasFile('img')) {
            $cover_path = Storage::put('uploads', $request['img']);
            $restaurant->img = $cover_path;
        } else {
            $restaurant->img = 'profile-default.png'; //in realtà l'img è required, valutare se tenere
        }

        $restaurant->save();

        if (isset($request['categories'])) {
            $restaurant->categories()->attach($request['categories']);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME); //passo i dati restaurant da rotta web-php
    }
}
