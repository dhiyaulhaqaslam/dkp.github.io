<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $pertanyaan = $request->pertanyaan;

        $apiKey = env('GEMINI_API_KEY');

        // Panggil Gemini API (pakai REST API endpoint generative model)
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-goog-api-key' => $apiKey,
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-pro:generateContent', [
                    'contents' => [
                        [
                            'role' => 'user',
                            'parts' => [
                                [
                                    'text' => "Kamu adalah chatbot website resmi DKP Kota Makassar. DKP adalah Dinas Ketahanan Pangan Kota Makassar. Jawablah sesuai konteks website ini. Website ini dibuat oleh Dhiyaulhaq Aslam Muhammad N. atau lebih dikenal sebagai Lazark sebagai pengembang."
                                ]
                            ]
                        ],
                        [
                            'role' => 'user',
                            'parts' => [
                                ['text' => $pertanyaan]
                            ]
                        ]
                    ]
                ]);

        if ($response->failed()) {
            return response()->json(['jawaban' => 'Maaf, terjadi kesalahan.']);
        }

        $result = $response->json();

        // Ambil jawaban dari response
        $jawaban = $result['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, saya tidak punya jawaban.';

        return response()->json(['jawaban' => $jawaban]);
    }

    public function ask()
    {
        return view('chatbot.ask', [
            'title' => 'Chat with Chatbot'
        ]);
    }

}
