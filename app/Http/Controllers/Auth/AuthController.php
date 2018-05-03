<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_People;
use Socialite;
use App\User;
use Auth;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        session()->put('provider',$provider);
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('index');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route('index');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('socialite_id', $githubUser->id)->first()) {
            return $authUser;
        }
        $provider = session()->get('provider');
        if($provider == 'google'){
            session()->forget('provider');
            $user= User::create([
                'nickname' => $githubUser->name,
                'name' => $githubUser->user['name']['givenName'],
                'surname' => $githubUser->user['name']['familyName'],
                'email' => $githubUser->email,
                'socialite_id' => $githubUser->id,
            ]);
            $user->assignRole('user');
            return $user;
        }elseif($provider == 'github'){
            session()->forget('provider');
            $user= User::create([
                'nickname' => $githubUser->nickname,
                'name' => $githubUser->user['name'],
                'surname' => $githubUser->user['name'],
                'email' => $githubUser->email,
                'socialite_id' => $githubUser->id,
            ]);
            $user->assignRole('user');
            return $user;
        }
    }
}
