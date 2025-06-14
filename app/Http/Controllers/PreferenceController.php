<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preference;
use App\Models\SocialMedia;

class PreferenceController extends Controller
{
    public function index()
    {
        // Ambil data preference untuk user yang sedang login
        $preference = auth()->user()->preference ?? new Preference();

        // Ambil data social media untuk user yang sedang login
        $socialMedia = auth()->user()->socialMedia ?? new SocialMedia();

        return view('preference.index', [
            'title' => 'Preferences',
            'preference' => $preference,
            'socialMedia' => $socialMedia,  // Menambahkan data social media ke view
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'max_users' => 'required|integer|min:1',
        ]);

        $preference = Preference::where('user_id', auth()->id())->first();

        if ($preference) {
            $preference->max_users = $request->max_users;
            $preference->save();
        } else {
            Preference::create([
                'user_id' => auth()->id(),
                'max_users' => $request->max_users,
            ]);
        }

        return redirect()->route('preference.index')->with('success', 'Preferences updated successfully!');
    }

    public function updateSocialMedia(Request $request)
    {
        $request->validate([
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
        ]);

        $socialMedia = auth()->user()->socialMedia ?? new SocialMedia();
        $socialMedia->user_id = auth()->id();  // Pastikan user_id sesuai dengan user yang login
        $socialMedia->facebook_url = $request->facebook_url;
        $socialMedia->instagram_url = $request->instagram_url;
        $socialMedia->twitter_url = $request->twitter_url;
        $socialMedia->save();

        return redirect()->route('preference.index')->with('success', 'Social media preferences updated successfully.');
    }
}
