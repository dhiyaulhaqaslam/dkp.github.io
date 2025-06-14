<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   public function index(Request $request)
    {
        $query = Project::query();

        // Ambil keyword dari request untuk fitur search
        $search = $request->input('search');

        // Jika ada search, tambahkan ke query
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('tanggal', 'like', "%{$search}%");
            });
        }

        // Sorting berdasarkan kolom dan arah
        $sortBy = $request->get('sort_by', 'nama'); // default sort by nama
        $sortOrder = $request->get('sort_order', 'asc'); // default ascending

        // Validasi kolom yang bisa disorting
        $validColumns = ['nama', 'status', 'tanggal'];
        if (in_array($sortBy, $validColumns)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $projects = $query->paginate(10);

        return view('projects.index', [
            'projects' => $projects,
            'title' => 'Daftar Projects',
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

        return view('projects.create', [
            'title' => 'Create Project',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:rencana,progres,arsip'],
        ]);

        // Pastikan nilai tanggal kosong diubah menjadi null
        $validated['tanggal'] = $validated['tanggal'] ?? null;

        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'title' => 'Detail Project',
            'project' => $project,
        ]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'title' => 'Edit Proyek',
            'project' => $project,
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'tanggal' => ['nullable', 'date'],
            'description' => ['nullable', 'string'],
            'status' => ['required', 'in:rencana,progres,arsip'],
        ]);

        // Pastikan nilai tanggal kosong diubah menjadi null
        $validated['tanggal'] = $validated['tanggal'] ?? null;

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
