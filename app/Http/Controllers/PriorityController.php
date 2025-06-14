<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel priority
        $informasi = Informasi::all();
        $priorities = Priority::all();

        // Kirim data ke view 'informasi.index'
        return view('informasi.index', [
            'title' => 'Informasi',
            'priorities' => $priorities,  // Kirimkan data prioritas
            'informasi' => $informasi,
        ]);
    }

    public function create()
    {
        return view('priority.create', [
            'title' => 'Buat Program Prioritas',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        // Menyimpan data ke tabel priority
        Priority::create($validated);

        return redirect()->route('informasi.index')->with('success', 'Program prioritas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $priority = Priority::findOrFail($id);

        return view('priority.edit', [
            'title' => 'Edit Program Prioritas',
            'priority' => $priority,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $priority = Priority::findOrFail($id);
        $priority->update($validated);

        return redirect()->route('priority.index')->with('success', 'Program prioritas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $priority = Priority::findOrFail($id);
        $priority->delete();

        return redirect()->route('priority.index')->with('success', 'Program prioritas berhasil dihapus!');
    }

}
