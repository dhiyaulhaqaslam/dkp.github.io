<?php

namespace App\Http\Controllers;

use App\Models\Longwis;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LongwisController extends Controller
{
    public function index(Request $request)
    {
        $query = Longwis::query();

        // Ambil keyword dari request untuk fitur search
        $search = $request->input('search');

        // Jika ada search, tambahkan ke query
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('tanggal', 'like', "%{$search}%")
                    ->orWhere('penduduk', 'like', "%{$search}%")
                    ->orWhere('rumah', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });
        }

        // Sorting berdasarkan kolom dan arah
        $sortBy = $request->get('sort_by', 'nama'); // Default sorting berdasarkan nama
        $sortOrder = $request->get('sort_order', 'asc'); // Default ascending

        // Validasi kolom yang bisa disort
        $validColumns = ['nama', 'tanggal', 'alamat', 'penduduk', 'rumah'];
        if (in_array($sortBy, $validColumns)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        // Eksekusi query dengan pagination
        $longwis = $query->paginate(10);

        // Passing data ke view
        return view('longwis.index', [
            'title' => 'Daftar Longwis',
            'longwis' => $longwis,
            'search' => $search,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ]);
    }

    public function create()
    {

        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('longwis.create', [
            'title' => 'Create Data Longwis', // Pastikan variabel ini ada
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'regex:/^(?=.*[a-zA-Z0-9]).+$/', 'max:255'], // Menambahkan regex untuk validasi nama
            'tanggal' => ['nullable', 'date', 'date_format:Y-m-d'],
            'alamat' => ['required', 'regex:/^[\w\s,.\'!&()-]+$/', 'max:255'],
            'penduduk' => 'required|integer',
            'rumah' => 'required|integer',
            'panjang_lorong' => 'nullable|numeric',
            'lebar_depan' => 'nullable|numeric',
            'lebar_tengah' => 'nullable|numeric',
            'lebar_belakang' => 'nullable|numeric',
            'koordinat_lorong' => 'nullable|string|max:255',
            'status' => ['required', 'in:rencana,progres,arsip'],
        ]);

        Longwis::create($validated);

        return redirect()->route('longwis.index')->with('success', 'Data berhasil ditambahkan!');
    }


    public function show($id)
    {
        $longwis = Longwis::findOrFail($id); // Menemukan data longwis berdasarkan ID
        $title = "Detail Longwis"; // Atur title sesuai kebutuhan
        return view('longwis.show', compact('longwis', 'title'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $longwis = Longwis::findOrFail($id);
        $title = "Edit Data Longwis"; // Definisikan variabel title
        return view('longwis.edit', compact('longwis', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'regex:/^(?=.*[a-zA-Z0-9]).+$/', 'max:255'], // Menambahkan regex untuk validasi nama
            'alamat' => ['required', 'regex:/^[\w\s,.\'!&()-]+$/', 'max:255'],
            'penduduk' => 'nullable|integer',
            'keluarga' => 'nullable|integer',
            'rumah' => 'nullable|integer',
            'panjang_lorong' => 'nullable|numeric',
            'lebar_depan' => 'nullable|numeric',
            'lebar_tengah' => 'nullable|numeric',
            'lebar_belakang' => 'nullable|numeric',
            'lintang_depan' => 'nullable|numeric',
            'bujur_depan' => 'nullable|numeric',
            'lintang_belakang' => 'nullable|numeric',
            'bujur_belakang' => 'nullable|numeric',
            'koordinat_lorong' => 'nullable|string|max:255',
            'status' => ['required', 'in:rencana,progres,arsip'],
        ]);

        $longwis = Longwis::findOrFail($id);
        $longwis->update($validatedData);

        return redirect()->route('longwis.show', $id)
            ->with('success', 'Data berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $longwis = Longwis::findOrFail($id); // Cari data berdasarkan ID
        $longwis->delete(); // Delete data
        return redirect()->route('longwis.index')->with('success', 'Data Longwis berhasil dihapus!');
    }

    public function downloadPdf($id)
    {
        $longwis = Longwis::findOrFail($id);
        $pdf = Pdf::loadView('longwis.pdf', compact('longwis'));
        return $pdf->download('detail-longwis-' . $longwis->id . '.pdf');
    }
}
