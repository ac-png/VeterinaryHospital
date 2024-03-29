<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {

        // Sets the user's home directory.
        $user = Auth::user();
        $home = 'home';

        // Redirect to the user's (based on their role) home page.
        if ($user->hasRole('admin')) {
            $home = 'admin.animals.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.animals.index';
        }
        return redirect()->route($home);
    }

    public function hospitalIndex(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.hospitals.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.hospitals.index';
        }
        return redirect()->route($home);
    }

    public function veterinarianIndex(Request $request)
    {
        $user = Auth::user();
        $home = 'home';

        if ($user->hasRole('admin')) {
            $home = 'admin.veterinarians.index';
        } else if ($user->hasRole('user')) {
            $home = 'user.veterinarians.index';
        }
        return redirect()->route($home);
    }
}
