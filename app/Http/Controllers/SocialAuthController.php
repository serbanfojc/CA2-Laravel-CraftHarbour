<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    /**
     * Redirect to the OAuth provider.
     */
    public function redirect(string $provider)
    {
        $this->validateProvider($provider);

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle the callback from the OAuth provider.
     */
    public function callback(string $provider)
    {
        $this->validateProvider($provider);

        $socialUser = Socialite::driver($provider)->user();

        $providerIdColumn = $provider . '_id';

        // Check if a user already exists with this social provider ID
        $user = User::where($providerIdColumn, $socialUser->getId())->first();

        if (!$user) {
            // Check if a user exists with the same email
            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                // Link the social account to the existing user
                $user->update([$providerIdColumn => $socialUser->getId()]);
            } else {
                // Create a new user
                $user = User::create([
                    'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User',
                    'email' => $socialUser->getEmail(),
                    'password' => bcrypt(Str::random(24)),
                    'role' => 'user',
                    $providerIdColumn => $socialUser->getId(),
                ]);
            }
        }

        Auth::login($user, remember: true);

        return redirect()->route('home');
    }

    /**
     * Validate that the provider is supported.
     */
    private function validateProvider(string $provider): void
    {
        if (!in_array($provider, ['google', 'facebook'])) {
            abort(404, 'Social provider not supported.');
        }
    }
}
