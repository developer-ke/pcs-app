<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        try {
            DB::beginTransaction();
            $providedUser = Socialite::driver($provider)->user();
            // check if the provider has a email
            if ($providedUser->email == null) {
                return back()->with("error", "Can't login with" . $provider . " now, try again later");
            }
            // Check if the user exists by provider_id
            $user = User::where('provider_id', $providedUser->id)->first();
            if (!$user) {
                // User doesn't exist, check by email
                $user = User::where('email', $providedUser->email)->first();
                if (!$user) {
                    // Create a new user
                    $user = User::create([
                        'name' => $providedUser->name,
                        'email' => $providedUser->email,
                        'provider' => $provider,
                        'provider_id' => $providedUser->id,
                        'provider_token' => $providedUser->token,
                    ]);
                } else {
                    // Update existing user with provider details
                    $user->update([
                        'name'           => $providedUser->name,
                        'provider'       => $provider,
                        'provider_id'    => $providedUser->id,
                        'provider_token' => $providedUser->token,
                    ]);
                }
            }
            DB::commit();
            // Log in the user
            Auth::login($user);
            return redirect()->route('home');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return redirect()->route('login')->with('error', 'An error occurred, please try again');
        }
    }
}
