<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use Validator;

class KategoriController extends Controller
{
    public function index()
    {
        //get data kategori
        $kategori = Kategori::paginate(10);

        return view('kategori.index', compact('kategori'));
    }
    
    public function store(Request $request)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // simpan ke tabel
        $kategori = Kategori::create($request->all());
        
        return response()->json($kategori, 201);
    }

    public function show($id)
    {
        // mengambil data by id
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json(['error' => 'Kategori not found'], 404);
        }
        return response()->json($kategori);
    }

    public function update(Request $request)
    {
        //cek data ada atau tidak
        $kategori = Kategori::find($request->get('id'));
        if (!$kategori) {
            return response()->json(['error' => 'Kategori not found'], 404);
        }
        
        // Validate the input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        //update data
        $kategori->update($request->only(['nama']));

        return response()->json($kategori);
    }

    public function delete($id)
    {
        // Cek apakah ID dikirimkan melalui request
        $kategori = Kategori::find($id);

        // Jika kategori tidak ditemukan, kembalikan error 404
        if (!$kategori) {
            return response()->json(['error' => 'Kategori not found'], 404);
        }

        // Hapus data kategori
        $kategori->delete();

        // Kembalikan response bahwa data berhasil dihapus
        return response()->json();
    }

}
