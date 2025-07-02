<?php

namespace App\Http\Controllers;

use App\Models\Longwis;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;

class LongwisController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->get('sort_by', 'nama');
        $sortOrder = $request->get('sort_order', 'asc');
        $validColumns = ['nama', 'tanggal', 'alamat', 'penduduk', 'rumah'];

        // Buat key cache dinamis berdasarkan search dan sorting
        $cacheKey = 'semua-longwis:' . md5($search . '|' . $sortBy . '|' . $sortOrder . '|' . $request->get('page', 1));

        if (!$search) {
            $longwis = Cache::remember($cacheKey, 60, function () use ($sortBy, $sortOrder, $validColumns) {
                $query = Longwis::query();

                if (in_array($sortBy, $validColumns)) {
                    $query->orderBy($sortBy, $sortOrder);
                }

                return $query->paginate(10);
            });
        } else {
            $query = Longwis::query();

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%")
                    ->orWhere('tanggal', 'like', "%{$search}%")
                    ->orWhere('penduduk', 'like', "%{$search}%")
                    ->orWhere('rumah', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            });

            if (in_array($sortBy, $validColumns)) {
                $query->orderBy($sortBy, $sortOrder);
            }

            $longwis = $query->paginate(10);
        }

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
            'title' => 'Create Data Longwis',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'regex:/^(?=.*[a-zA-Z0-9]).+$/', 'max:255'],
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
        Cache::flush(); // Kosongkan semua cache longwis

        return redirect()->route('longwis.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $longwis = Longwis::findOrFail($id);
        $title = "Detail Longwis";

        return view('longwis.show', compact('longwis', 'title'));
    }

    public function edit($id)
    {
        $longwis = Longwis::findOrFail($id);
        $title = "Edit Data Longwis";

        return view('longwis.edit', compact('longwis', 'title'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'regex:/^(?=.*[a-zA-Z0-9]).+$/', 'max:255'],
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

        Cache::flush(); // Kosongkan cache setelah update

        return redirect()->route('longwis.show', $id)
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $longwis = Longwis::findOrFail($id);
        $longwis->delete();

        Cache::flush(); // Kosongkan cache setelah delete

        return redirect()->route('longwis.index')->with('success', 'Data Longwis berhasil dihapus!');
    }

    public function downloadPdf($id)
    {
        $longwis = Longwis::findOrFail($id);
        $pdf = Pdf::loadView('longwis.pdf', compact('longwis'));
        return $pdf->download('detail-longwis-' . $longwis->id . '.pdf');
    }
}
