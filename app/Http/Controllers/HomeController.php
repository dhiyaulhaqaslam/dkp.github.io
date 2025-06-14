<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Informasi;
use App\Models\Priority;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil 4 artikel terbaru
        $articles = Article::latest()->take(4)->get();
        $informasi = Informasi::all();
        $priorities = Priority::all();

        // Mengirim data artikel ke view welcome
        return view('welcome', [
            'title' => 'Home',
            'articles' => $articles,
            'informasi' => $informasi,
            'priorities' => $priorities,
        ]);
    }
}
