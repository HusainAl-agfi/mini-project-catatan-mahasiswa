<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan; // Menghubungkan controller dengan Model Catatan

class CatatanController extends Controller
{
    // 1. Menampilkan daftar seluruh catatan (Materi Utama)
    public function index()
    {
        $catatan = Catatan::all(); // Mengambil semua data dari database lewat Model
        return view('catatan.index', compact('catatan')); // Mengirim data ke view index
    }

    // 2. Menampilkan form untuk tambah catatan baru (Materi Utama)
    public function create()
    {
        return view('catatan.create');
    }

    // 3. Menyimpan catatan baru ke database (Gabungan Tugas 1 & Tugas 3)
    public function store(Request $request)
    {
        // Tugas 3: Validasi Form Input sebelum disimpan
        $request->validate([
            'judul' => 'required',          // Judul wajib diisi
            'isi' => 'required|min:10',     // Isi catatan wajib diisi & minimal 10 karakter
            'tanggal' => 'required|date',   // Validasi field tanggal baru
            'kategori' => 'required'        // Validasi field kategori baru
        ]);

        // Tugas 1: Menyimpan data termasuk field tanggal & kategori ke database
        Catatan::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal, 
            'kategori' => $request->kategori
        ]);

        return redirect('/catatan')->with('success', 'Catatan sukses ditambahkan!');
    }

    // 4. Tugas 2: Menampilkan Form Edit Data berdasarkan ID Catatan
    public function edit($id)
    {
        $catatan = Catatan::find($id); // Mencari data catatan yang mau diedit
        return view('catatan.edit', compact('catatan'));
    }

    // 5. Tugas 2: Memproses pembaruan data ke database setelah diedit
    public function update(Request $request, $id)
    {
        // Tugas 3: Proteksi validasi juga diterapkan saat update data
        $request->validate([
            'judul' => 'required',
            'isi' => 'required|min:10',
            'tanggal' => 'required|date',
            'kategori' => 'required'
        ]);

        $catatan = Catatan::find($id);
        $catatan->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori
        ]);

        return redirect('/catatan')->with('success', 'Catatan sukses diperbarui!');
    }

    // 6. Menghapus data catatan dari database (Materi Utama)
    public function destroy($id)
    {
        Catatan::find($id)->delete(); // Mencari data berdasarkan ID lalu menghapusnya
        return redirect('/catatan')->with('success', 'Catatan sukses dihapus!');
    }
}