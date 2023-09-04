<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        $SocialUser = Socialite::driver($provider)->user();
        $login_user = DB::table('users')->where('email', $SocialUser->email)->get();
        $name = null;
        $nickname = null;
        // dd($SocialUser);
        if ($SocialUser->name == null) {
            $name = "Null Name";
        } else {
            $name = $SocialUser->name;
        }
        if ($SocialUser->nickname == null) {
            $nickname = "Null Nick Name";
        } else {
            $nickname = $SocialUser->nickname;
        }
        if (count($login_user) == 0) {
            $user = User::updateOrCreate([
                'provider_id' => $SocialUser->id,
                'provider' => $provider
            ], [
                'name' => $name,
                'user_name' => $nickname,
                'email' => $SocialUser->email,
                'provider_token' => $SocialUser->token,
            ]);
        } else {
            DB::table('users')->where('email', $SocialUser->email)->update(['email' => $SocialUser->email, 'provider' => $provider]);
            $user = User::where('email', $SocialUser->email)->first();
        }
        Auth::login($user);

        return redirect('/dashboard');
    }
}
