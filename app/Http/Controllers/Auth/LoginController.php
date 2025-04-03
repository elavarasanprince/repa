<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show Login Page
   // Show the Member Login Page
public function showMemberLoginForm()
{
    return view('front.login');
}
public function showLoginForm ()
{
    return view('front.login');
}

    // Handle Login Request
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //     ]);
    
    //     // Check if email exists
    //     $user = \App\Models\User::where('email', $request->email)->first();
    
    //     if (!$user) {
    //         return redirect()->route('MemberLogin')->withErrors(['email' => 'Email not found.']);
    //     }
    
    //     // Check if password is correct
    //     if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return redirect()->route('MemberLogin')->withErrors(['password' => 'Incorrect password.']);
    //     }
    
    //     // If login is successful
    //     $user = Auth::user();
    //     if ($user->user_type == 'member') {
    //         return redirect()->route('Events');
    //     } elseif ($user->user_type == 'admin') {
    //         return redirect()->route('home');
    //     } else {
    //         Auth::logout();
    //         return redirect()->route('MemberLogin')->withErrors(['error' => 'Unauthorized Access']);
    //     }
    // }
 public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Check if user exists and is active
    $user = \App\Models\User::where('email', $request->email)->where('status', 'active')->first();

    if (!$user) {
        return redirect()->route('MemberLogin')->withErrors(['email' => 'Email not found or account inactive.']);
    }

    // Check if password is correct
    if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->route('MemberLogin')->withErrors(['password' => 'Incorrect password.']);
    }

    // If login is successful
    $user = Auth::user();
    
   if ($user->user_type == 'member') {
    $redirectUrl = session('redirect_url', route('showprofile'));
    session()->forget('redirect_url'); // Clear session after use
    return redirect($redirectUrl)->with('success', 'Login successful!');
} elseif ($user->user_type == 'admin') {
    return redirect()->route('home')->with('success', 'Welcome, Admin!');
} else {
        Auth::logout();
        return redirect()->route('MemberLogin')->withErrors(['error' => 'Unauthorized Access']);
    }
}

    

    // Logout Function
    public function logout()
    {
        Auth::logout();
        return redirect()->route('MemberLogin')->with('success', 'Logged out successfully');
    }


    public function show()
    {
        return view('front.profile', ['user' => Auth::user()]);
    }
}

