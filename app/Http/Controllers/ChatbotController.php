<?php

namespace App\Http\Controllers;

use App\Models\Chatbot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    // Menampilkan daftar chatbot
    public function index()
    {
        $chatbot = Chatbot::paginate(10);
        $title = "Daftar Chatbot"; // Menetapkan title untuk halaman ini
        return view('chatbot.index', compact('chatbot', 'title'));
    }


    // Menampilkan form untuk membuat chatbot baru
    public function create()
    {
        $title = "Buat Chatbot Baru"; // Menetapkan title untuk halaman ini
        return view('chatbot.create', compact('title'));
    }

    // Menyimpan data chatbot baru
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        Chatbot::create([
            'pertanyaan' => $request->pertanyaan,
            'jawaban' => $request->jawaban,
        ]);

        return redirect()->route('chatbot.index');
    }


    // Menampilkan form edit chatbot
    public function edit($id)
    {
        $chatbot = Chatbot::findOrFail($id);
        $title = "Edit Chatbot";
        return view('chatbot.edit', compact('chatbot', 'title'));
    }

    // Memperbarui data chatbot
    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        $chatbot = Chatbot::findOrFail($id);
        $chatbot->pertanyaan = $request->pertanyaan;
        $chatbot->jawaban = $request->jawaban;
        $chatbot->save();

        return redirect()->route('chatbot.index')->with('success', 'Data berhasil diperbarui!');
    }

    // Menghapus chatbot
    public function destroy($id)
    {
        $chatbot = Chatbot::findOrFail($id);
        $chatbot->delete();

        return redirect()->route('chatbot.index')->with('success', 'Data berhasil dihapus!');
    }

    // Menampilkan halaman untuk chat dengan chatbot
    public function ask()
    {
        $title = "Tanya Chatbot"; // Menetapkan title untuk halaman ini
        return view('chatbot.ask', compact('title'));
    }

    // Menangani pertanyaan yang diajukan ke chatbot
    public function chat(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
        ]);

        $pertanyaan = $request->pertanyaan;

        // Cari jawaban di database berdasarkan pertanyaan
        $chatbot = Chatbot::where('pertanyaan', 'LIKE', '%' . $pertanyaan . '%')->first();

        if ($chatbot) {
            return response()->json(['jawaban' => $chatbot->jawaban]);
        }

        // Jika tidak ditemukan jawaban
        return response()->json(['jawaban' => 'Maaf, saya tidak tahu jawabannya.']);
    }
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return response()->json(['message' => 'ID tidak valid'], 400);
        }

        Chatbot::whereIn('id', $ids)->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }


}
