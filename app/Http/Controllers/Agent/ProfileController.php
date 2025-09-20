<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Menampilkan form edit profil agen.
     */
    public function edit(Request $request)
    {
        return view('agent.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Memperbarui profil agen.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'experience' => ['nullable', 'string'],
            'profile_photo_path' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // Handle upload foto profil
        if ($request->hasFile('profile_photo_path')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo_path) {
                Storage::delete('public/' . $user->profile_photo_path);
            }
            // Simpan foto baru
            $validated['profile_photo_path'] = $request->file('profile_photo_path')->store('profile-photos', 'public');
        }

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('agent.profile.edit')->with('status', 'profile-updated');
    }
}