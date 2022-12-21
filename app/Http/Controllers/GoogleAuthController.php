<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try{
            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->getEmail())->first();  
                   
            if($user){
                

                Auth::login($user);

                return redirect()->intended('home');

            }else{
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(), 
                    'username' => 'Usuário', 
                ]);

                Auth::login($new_user);

                return redirect()->intended('home');
            }
        }catch(\Throwable $th){
            dd('Alguma coisa deu errado!' . $th->getMessage());
        }
    }
}
