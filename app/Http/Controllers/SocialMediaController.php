<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialMediaController extends Controller
{
    public function edit()
    {
        $socialMedia = Auth::user()->socialMedia;
        return view('social_media.edit', [
            'title' => 'Sosmed',
            'socialMedia' => $socialMedia
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
        ]);

        $user = Auth::user();

        // Jika belum ada, buat data sosial media baru
        if (!$user->socialMedia) {
            $user->socialMedia()->create($request->only('facebook_url', 'instagram_url', 'twitter_url'));
        } else {
            $user->socialMedia->update($request->only('facebook_url', 'instagram_url', 'twitter_url'));
        }

        return redirect()->route('social_media.edit')->with('success', 'Social media preferences updated successfully.');
    }
}
