<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::with([
            'mesArticles',
            'likes.rythme',
            'suivis',
            'suiveurs'
        ])->findOrFail($id);

        return view('user.show', compact('user'));
    }
    public function follow($id)
    {
        $user = User::findOrFail($id);
        $authUser = auth()->user();

        if ($authUser->suivis->contains($user->id)) {
            $authUser->suivis()->detach($user->id);
        } else {
            $authUser->suivis()->attach($user->id);
        }

        return redirect()->back();
    }



}
