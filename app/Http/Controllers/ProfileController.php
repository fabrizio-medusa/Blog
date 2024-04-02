<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:4096',
            'description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile_images', $imageName);
            $user->profile_image = $imageName;
        }

        $user->description = $request->input('description');

        $user->save();

        return redirect()->back()->with('success', 'Profilo aggiornato con successo!');
    }
}
