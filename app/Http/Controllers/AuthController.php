<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Visitor;

class AuthController extends Controller
{
    // ... lines omitted for brevity in thought, but I'll provide the exact replacement
    /**
     * Show register form
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle register request
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('user.dashboard');
    }

    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    /**
     * Show admin dashboard
     */
    public function adminDashboard()
    {
        $userCount = User::count();
        $newsCount = News::count();
        $galleryCount = Gallery::count();
        $contactCount = \App\Models\Contact::count();
        
        // Visitor Statistics
        $uniqueVisitors = Visitor::count();
        $totalHits = Visitor::sum('hits');
        $returningVisitors = Visitor::where('hits', '>', 1)->count();

        // Data for Bar Chart (Distribution)
        $chartData = [
            'labels' => ['Users', 'News', 'Gallery', 'Contacts', 'Unique Vis.'],
            'data' => [$userCount, $newsCount, $galleryCount, $contactCount, $uniqueVisitors],
        ];

        // Data for Line Chart (Simplified: Growth over time)
        // For demonstration, we'll fetch news count per day for the last 7 days
        $last7Days = [];
        $newsPerDay = [];
        $visitorsPerDay = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $last7Days[] = now()->subDays($i)->format('D');
            $newsPerDay[] = News::whereDate('created_at', $date)->count();
            $visitorsPerDay[] = Visitor::whereDate('created_at', $date)->count();
        }

        $growthChart = [
            'labels' => $last7Days,
            'data' => $newsPerDay,
            'visitorData' => $visitorsPerDay,
        ];

        return view('admin.dashboard', compact(
            'userCount', 
            'newsCount', 
            'galleryCount', 
            'contactCount',
            'uniqueVisitors',
            'totalHits',
            'returningVisitors',
            'chartData',
            'growthChart'
        ));
    }

    /**
     * Show user dashboard
     */
    public function userDashboard()
    {
        return view('user.dashboard');
    }
}
