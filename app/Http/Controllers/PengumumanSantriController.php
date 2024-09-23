<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanSantriController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all(); // Fetch all announcements
        return view('santriPengumuman', compact('pengumuman')); // Make sure this matches the view name
    }
}
