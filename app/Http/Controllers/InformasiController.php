<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Priority;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::all();
        $priorities = Priority::all();

        return view('informasi.index', [
            'title' => 'Informasi',
            'informasi' => $informasi,
            'priorities' => $priorities,  // Kirimkan data prioritas
        ]);
    }

    public function create()
    {
        return view('informasi.create', [
            'title' => 'Create Informasi',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_link' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('informasi', 'public');
            $validated['gambar'] = $path;
        }

        Informasi::create($validated);
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $informasi = Informasi::findOrFail($id);
        $priorities = Priority::all();  // Ambil data prioritas dari tabel priority

        return view('informasi.edit', [
            'title' => 'Edit Informasi',
            'informasi' => $informasi,
            'priorities' => $priorities,  // Kirim data priorities ke view
        ]);
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_link' => 'nullable|url|max:255',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Delete gambar lama jika ada
            if ($informasi->gambar && \Storage::exists('public/' . $informasi->gambar)) {
                \Storage::delete('public/' . $informasi->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        // Perbarui data
        $informasi->update($validated);

        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil dihapus!');
    }

    public function about()
    {
        // Ambil data dari tabel Informasi
        $informasi = Informasi::all();

        return view('about.index', [
            'title' => 'Tentang Kami',
            'informasi' => $informasi,
        ]);
    }

    public function welcome()
    {
        // Ambil data dari tabel Informasi
        $informasi = Informasi::all();

        return view('welcome', [
            'title' => 'Info',
            'informasi' => $informasi,
        ]);
    }

    public function showAboutPage()
    {
        $informasi = Informasi::latest()->get();
        return view('about.index', compact('informasi'));
    }
    public function __construct()
    {
        $this->middleware('auth')->except(['about', 'showAboutPage']);
    }
}
