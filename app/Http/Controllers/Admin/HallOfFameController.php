<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HallOfFame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HallOfFameController extends Controller
{
    // Menampilkan halaman daftar kepengurusan
    public function index()
    {
        $members = HallOfFame::latest()->get();
        return view('admin.hall_of_fame.index', compact('members'));
    }

    // Menampilkan form tambah pengurus
    public function create()
    {
        return view('admin.hall_of_fame.create');
    }

    // Memproses data yang diinput dari form
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'role_title' => 'required|string|max:255',
            'sub_group_name' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5048',
        ]);

        // Proses Upload Gambar
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('hall_of_fame', 'public');
        }

        // Simpan ke Database
        HallOfFame::create([
            'name' => $request->name,
            'role_title' => $request->role_title,
            'sub_group_name' => $request->sub_group_name,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.hall_of_fame.index')->with('success', 'Data pengurus berhasil ditambahkan ke Hall of Fame!');
    }

    // Menghapus data pengurus
    public function destroy($id)
    {
        $member = HallOfFame::findOrFail($id);

        if ($member->image_path && Storage::disk('public')->exists($member->image_path)) {
            Storage::disk('public')->delete($member->image_path);
        }

        $member->delete();

        return redirect()->route('admin.hall_of_fame.index')->with('success', 'Data pengurus berhasil dihapus.');
    }
}