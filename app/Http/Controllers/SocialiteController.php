<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback()
    {
        try {
            $social = Socialite::driver('google')->user();
            $user = User::where('google_id', $social->id)->first();
            if ($user) {
                Auth::login($user);
                return redirect('');
            } else {
                $newUser = User::create([
                    'name' => $social->name,
                    'email' => $social->email,
                    'email' => 'email@gmail.com',
                    'google_id' => $social->id,
                    'phone' => '0708050907',
                    'admin' => '0',
                    'status' => '1',
                    'address' => 'null',
                    'birthday' => 'null',
                    'sex' => 'null',
                    'password' => encrypt('quang123'),
                ]);
                Auth::login($newUser);
                return redirect('');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
