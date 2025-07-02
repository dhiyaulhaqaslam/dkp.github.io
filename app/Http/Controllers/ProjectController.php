<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->get('sort_by', 'nama');
        $sortOrder = $request->get('sort_order', 'asc');
        $validColumns = ['nama', 'status', 'tanggal'];

        // Buat key cache dinamis
        $cacheKey = 'semua-projects:' . md5($search . '|' . $sortBy . '|' . $sortOrder . '|' . $request->get('page', 1));

        if (!$search) {
            $projects = Cache::remember($cacheKey, 60, function () use ($sortBy, $sortOrder, $validColumns) {
                $query = Project::query();
                if (in_array($sortBy, $validColumns)) {
                    $query->orderBy($sortBy, $sortOrder);
                }
                return $query->paginate(10);
            });
        } else {
            $query = Project::query();

            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('tanggal', 'like', "%{$search}%");
            });

            if (in_array($sortBy, $validColumns)) {
                $query->orderBy($sortBy, $sortOrder);
            }

            $projects = $query->paginate(10);
        }

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

        $validated['tanggal'] = $validated['tanggal'] ?? null;
        Project::create($validated);

        Cache::flush(); // Kosongkan cache setelah create

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

        $validated['tanggal'] = $validated['tanggal'] ?? null;
        $project->update($validated);

        Cache::flush(); // Kosongkan cache setelah update

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        Cache::flush(); // Kosongkan cache setelah delete

        return redirect()->route('projects.index')->with('success', 'Proyek berhasil dihapus!');
    }
}
