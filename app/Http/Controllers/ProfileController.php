<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\RequestContext;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {

        $user = User::find($user);
        return view('profile', ['user' => $user]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editProfile() {
        $user = Auth::user();
        return view('editProfile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        // Validierung der Eingaben
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        // Authentifizierten Benutzer abrufen und typisieren
        /** @var User $user */
        $user = Auth::user();

        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email']
        ]);
        return redirect()->route('profile.edit')->with('success', 'Profil geändert');

    }
}
