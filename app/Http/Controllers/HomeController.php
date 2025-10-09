<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Informasi;
use App\Models\Priority;
use App\Models\Longwis; // ← tambahkan ini

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(4);
        $informasi = Informasi::all();
        $priorities = Priority::all();
        $longwis = Longwis::latest()->take(6)->get(); // ← ambil data longwis

        return view('welcome', [
            'title' => 'Home',
            'articles' => $articles,
            'informasi' => $informasi,
            'priorities' => $priorities,
            'longwis' => $longwis, // ← kirim ke view
        ]);
    }
}
