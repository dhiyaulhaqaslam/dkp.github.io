<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index', [
            "title" => "Contact",
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        Feedback::create($validated);

        return redirect()->route('feedbacks.index')->with('success', 'Thank you for your feedback!');
    }

    public function showFeedbacks()
    {
        $feedbacks = Feedback::latest()->paginate(5);
        return view('feedbacks.index', [
            'feedbacks' => $feedbacks,
            'title' => 'Kritik dan Saran', // Createkan title di sini
        ]);
    }
}
