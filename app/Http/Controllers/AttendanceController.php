<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $attendances = Attendance::where('user_id', Auth::id())->get();
        return view('attendance.index', compact('attendances', 'user'))->with('title', 'Attendance');
    }

    public function listPerHari()
    {
        $attendances = Attendance::with('user')->orderBy('date', 'desc')->orderBy('time', 'asc')->get();
        return view('attendance.list', compact('attendances'))->with('title', 'Daftar Absensi Harian');
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:Hadir,Izin,Sakit', // Validasi jenis absensi
        ]);

        $today = date('Y-m-d');

        // Periksa apakah user sudah absen hari ini
        $alreadyCheckedIn = Attendance::where('user_id', Auth::id())->where('date', $today)->exists();

        if ($alreadyCheckedIn) {
            return redirect()->back()->with('error', 'Anda sudah melakukan absensi hari ini.');
        }

        Attendance::create([
            'user_id' => Auth::id(),
            'date' => $today,
            'type' => $request->type,
            'time' => now(), // Waktu saat absensi
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil dicatat!');
    }
    public function destroy($id)
    {
        $attendance = Attendance::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$attendance) {
            return redirect()->back()->with('error', 'Absensi tidak ditemukan atau bukan milik Anda.');
        }

        $attendance->delete();

        return redirect()->back()->with('success', 'Absensi berhasil dihapus!');
    }


}
