<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect(string $provider)
    {
        $this->validateProvider($provider);

        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        $this->validateProvider($provider);

        $socialUser = Socialite::driver($provider)->user();

        $providerIdColumn = $provider . '_id';

        $user = User::where($providerIdColumn, $socialUser->getId())->first();

        if (!$user) {
            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                $user->update([$providerIdColumn => $socialUser->getId()]);
            } else {
                $user = User::create([
                    'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User',
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(Str::random(24)),
                    'role' => 'member',
                    $providerIdColumn => $socialUser->getId(),
                ]);
            }
        }

        Auth::login($user, remember: true);

        return redirect()->route('home');
    }

    private function validateProvider(string $provider): void
    {
        if (!in_array($provider, ['google'])) {
            abort(404, 'Social provider not supported.');
        }
    }
}