<?php

namespace App\Http\Controllers;

use App\Models\Longwis;
use App\Models\Article;
use App\Models\Project;
use App\Models\Feedback;
use App\Models\Program;
use App\Models\Priority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Ambil pengguna yang sedang login
        $title = "Dashboard";
        $feedbackCount = Feedback::count(); // Mengambil jumlah feedback
        $articleCount = Article::count(); // Mengambil jumlah total artikel
        $longwisCount = Longwis::count(); // Mengambil jumlah total Longwis
        $projectCount = Project::count(); // Mengambil jumlah total proyek
        $programCount = Program::count(); // Mengambil jumlah total program
        $articles = Article::latest()->take(3)->get(); // Ambil 3 artikel terbaru
        $longwis = Longwis::take(3)->get(); // Ambil 3 data Longwis pertama
        $projects = Project::latest()->take(3)->get(); // Ambil 3 data proyek terbaru
        $programs = Program::latest()->take(3)->get(); // Ambil 3 data program terbaru
        $priorities = Priority::all();  // Ambil data prioritas, pastikan sudah ada model Priority

        // Kirimkan data ke view
        return view('dashboard', compact('user', 'title', 'longwis', 'articles', 'projects', 'feedbackCount', 'articleCount', 'longwisCount', 'projectCount', 'programCount', 'programs', 'priorities'));
    }
}
