<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Cache;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');

        // Jika tidak ada pencarian, pakai cache
        if (!$search) {
            $articles = Cache::remember('semua-article', 60, function () {
                return Article::all();
            });
        } else {
            // Jika ada pencarian, query langsung tanpa cache
            $articles = Article::where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('tanggal', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })->get();
        }

        // Tambahkan properti `image_path` untuk setiap artikel
        foreach ($articles as $article) {
            $article->image_path = $article->image
                ? asset('storage/article-images/' . $article->image)
                : null; // Set null jika tidak ada gambar
        }

        return view('article.index', [
            'title' => 'Articles',
            'articles' => $articles,
            'search' => $search,
        ]);
    }


    public function create()
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('article.create', [
            'title' => 'Create Artikel Baru'
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'title' => ['required', 'regex:/^(?=.*[a-zA-Z0-9]).+$/', 'max:255'],
            'excerpt' => ['required', 'regex:/^[a-zA-Z0-9\s,.\'-]+$/', 'max:255'],
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal' => 'required|date',
            'status' => ['required', 'in:rencana,progres,arsip'],
        ]);

        // Proses upload file jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('article-images', 'public');
        }

        // Simpan data ke database
        $validated['slug'] = Str::slug($validated['title']);
        Article::create($validated);
        Cache::forget('semua-article');
        return redirect()->route('article.show', $validated['slug']);
    }


    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('article.show', [
            'title' => 'Lengkap',
            'article' => $article
        ]);
    }

    public function edit($id)
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $article = Article::findOrFail($id);

        return view('article.edit', [
            'title' => 'Edit Artikel',
            'article' => $article
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input form
        $validated = $request->validate([
            'title' => ['required', 'regex:/^(?=.*[a-zA-Z0-9]).+$/', 'max:255'],
            'excerpt' => ['required', 'regex:/^[a-zA-Z0-9\s,.\'-]+$/', 'max:255'],
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'tanggal' => 'required|date',
            'status' => ['required', 'in:rencana,progres,arsip'],
        ]);

        $article = Article::findOrFail($id);

        // Jika user mengunggah gambar baru
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('article-images', 'public');
        }

        // Update slug hanya jika title berubah
        if ($request->title !== $article->title) {
            $validated['slug'] = Str::slug($request->title);
        }

        $article->update($validated);
        Cache::forget('semua-article');

        return redirect()->route('article.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        Cache::forget('semua-article');

        return redirect()->route('article.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
