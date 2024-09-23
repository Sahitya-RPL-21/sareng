<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    // Show the list of announcements
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('admin.pengumuman_admin', compact('pengumuman'));
    }

    // Show form for creating a new announcement
    public function create()
    {
        return view('admin.pengumuman_admin', ['createMode' => true]);
    }

    // Store a newly created announcement in the database
    public function store(Request $request)
    {
        $request->validate([
            'link_sheet' => 'required|string|max:255',
            'detail' => 'required',
            'tanggal' => 'required|date',
        ]);

        Pengumuman::create([
            'link_sheet' => $request->link_sheet,
            'detail' => $request->detail,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin-pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    // Show form for editing an announcement
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('admin.pengumuman_admin', ['pengumuman' => $pengumuman, 'editMode' => true]);
    }

    // Update the specified announcement in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'link_sheet' => 'required|string|max:255',
            'detail' => 'required',
            'tanggal' => 'required|date',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update([
            'link_sheet' => $request->link_sheet,
            'detail' => $request->detail,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin-pengumuman.index')->with('success', 'Pengumuman berhasil diupdate!');
    }

    // Delete the specified announcement from the database
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('admin-pengumuman.index')->with('success', 'Pengumuman berhasil dihapus!');
    }
}
