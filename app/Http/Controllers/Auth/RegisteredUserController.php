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

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Faker $faker): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //TO-DO: get real data from form
        //fake-iamo la registrazione del rest con quella dell'user
        $picsum_img = 'https://picsum.photos/200';
        $category_ids = Category::all()->pluck('id')->all();

        $restaurant = new Restaurant();

        $restaurant->name = 'pizza' . ($user->id);
        $restaurant->img = $picsum_img;
        $restaurant->address = $faker->address();
        $restaurant->slug = Str::slug($restaurant->name . '-' . $restaurant->address);
        $restaurant->vat =  $faker->bothify('#######-###-#');
        $restaurant->user_id = $user->id;

        $restaurant->save();

        $restaurant->categories()->attach($faker->randomElements($category_ids, rand(1, 2)));
        //end fake

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
