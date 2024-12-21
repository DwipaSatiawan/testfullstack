<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pengarang;
use Validator;

class BukuController extends Controller
{
    
    public function index()
    {
        //get data buku
        $buku = Buku::with(['kategori', 'pengarang'])->paginate(10);
        
        //get data kategori
        $kategori = Kategori::all();

        //get data pengarang
        $pengarang = Pengarang::all();

        return view('buku.index', compact('buku', 'kategori', 'pengarang'));
    }
    
    public function store(Request $request)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'kategori_id' => 'not_in:0',
            'pengarang_id' => 'not_in:0',
            'tahun' => 'not_in:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // simpan ke tabel
        $buku = Buku::create($request->all());
        
        return response()->json($buku, 201);
    }

    public function show($id)
    {
        // mengambil data by id
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json(['error' => 'Buku not found'], 404);
        }
        return response()->json($buku);
    }

    public function update(Request $request)
    {
        //cek data ada atau tidak
        $buku = Buku::find($request->get('id'));
        if (!$buku) {
            return response()->json(['error' => 'Buku not found'], 404);
        }
        
        // Validate the input
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'kategori_id' => 'not_in:0',
            'pengarang_id' => 'not_in:0',
            'tahun' => 'not_in:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        //update data
        $buku->update($request->all());

        return response()->json($buku);
    }

    public function delete($id)
    {
        // Cek apakah ID dikirimkan melalui request
        $buku = Buku::find($id);

        // Jika kategori tidak ditemukan, kembalikan error 404
        if (!$buku) {
            return response()->json(['error' => 'Buku not found'], 404);
        }

        // Hapus data Buku
        $buku->delete();

        // Kembalikan response bahwa data berhasil dihapus
        return response()->json();
    }
}
