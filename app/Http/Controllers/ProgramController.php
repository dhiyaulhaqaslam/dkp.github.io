<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->paginate(10);
        return view('program.index', ['programs' => $programs, 'title' => 'Daftar Program']);
    }

    public function create()
    {
        return view('program.create', ['title' => 'Tambah Program']);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer|min:1',
        ]);

        // Simpan data ke database
        Program::create([
            'nama' => $request->input('nama'),
            'umur' => $request->input('umur'),
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('program.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show(Program $program)
    {
        return view('program.show', ['program' => $program, 'title' => 'Detail Program']);
    }
}
