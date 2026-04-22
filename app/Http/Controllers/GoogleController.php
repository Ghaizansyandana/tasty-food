<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    // Pastikan bagian fungsi ini ADA dan namanya persis seperti ini
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            
            // 1. Cari user berdasarkan google_id atau email
            $finduser = User::where('google_id', $user->id)
                            ->orWhere('email', $user->email)
                            ->first();

            if($finduser){
                // Jika user ditemukan tapi belum punya google_id (misal login pertama kali via email biasa)
                if (!$finduser->google_id) {
                    $finduser->update([
                        'google_id' => $user->id
                    ]);
                }

                Auth::login($finduser);
                return $this->redirectUserByRole($finduser);
            } else {
                // Buat user baru jika belum ada
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make(bin2hex(random_bytes(10))), // Password lebih aman
                    'role' => 'user' // Default ke user
                ]);

                Auth::login($newUser);
                return $this->redirectUserByRole($newUser);
            }
        } catch (Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage(), [
                'exception' => $e
            ]);
            return redirect()->route('login')->withErrors(['error' => 'Gagal login dengan Google: ' . $e->getMessage()]);
        }
    }

    /**
     * Helper untuk redirect berdasarkan role
     */
    protected function redirectUserByRole($user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    }

    /**
     * Dashboard fallback route
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return $this->redirectUserByRole(Auth::user());
        }
        return redirect()->route('login');
    }
}