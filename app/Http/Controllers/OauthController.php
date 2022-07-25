<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
class OauthController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
                $user = Socialite::driver('google')->stateless()->user();
                $finduser = User::where('provider_id', $user->id)->first();
                if($finduser){
                    Auth::login($finduser);
                    return redirect('/dashboard');
                }else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'provider_id'=> $user->id,
                    ]);
                    Auth::login($newUser);
                    return redirect('/dashboard');
                }
            } catch (Exception $e) {
                dd($e->getMessage());
            }
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try {
                $user = Socialite::driver('facebook')->stateless()->user();
                $finduser = User::where('provider_id', $user->id)->first();
                if($finduser){
                    Auth::login($finduser);
                    return redirect('/dashboard');
                }else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'provider_id'=> $user->id,
                    ]);
                    Auth::login($newUser);
                    return redirect('/dashboard');
                }
            } catch (Exception $e) {
                dd($e->getMessage());
            }
    }
}