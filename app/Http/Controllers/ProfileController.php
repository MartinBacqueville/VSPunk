<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function show(){
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }

    public function edit(){
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request){
        $user = auth()->user();
        $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id,
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],[
                'name.required' => "Le nom est obligatoire",
                'email.required' => "L'email est obligatoire",
                'email.email' => "L'email est invalide",
            ]);

            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store('avatars', 'public');
                $user->avatar = asset('storage/' . $path);
            }

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->save();
        return redirect()->route('profile.show', $user->id)
            ->with('success', 'Profil mis à jour !');
    }
    public function destroy(){
        $profile = auth()->user();
        $profile->delete();
        Log::Warning("Profil supprimé avec succès :".$profile->email);
        return redirect()->route('profile.show')->with('success', 'Profil supprimé avec succès.');
    }
}
