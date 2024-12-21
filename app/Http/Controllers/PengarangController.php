<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengarang;
use Validator;

class PengarangController extends Controller
{
    public function index()
    {
        //get data pengarang
        $pengarang = Pengarang::paginate(10);

        return view('pengarang.index', compact('pengarang'));
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
        $pengarang = Pengarang::create($request->all());
        
        return response()->json($pengarang, 201);
    }

    public function show($id)
    {
        // mengambil data by id
        $pengarang = Pengarang::find($id);

        if (!$pengarang) {
            return response()->json(['error' => 'Pengarang not found'], 404);
        }
        return response()->json($pengarang);
    }

    public function update(Request $request)
    {
        //cek data ada atau tidak
        $pengarang = Pengarang::find($request->get('id'));
        if (!$pengarang) {
            return response()->json(['error' => 'Pengarang not found'], 404);
        }
        
        // Validate the input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        //update data
        $pengarang->update($request->only(['nama']));

        return response()->json($pengarang);
    }

    public function delete($id)
    {
        // Cek apakah ID dikirimkan melalui request
        $pengarang = Pengarang::find($id);

        // Jika Pengarang tidak ditemukan, kembalikan error 404
        if (!$pengarang) {
            return response()->json(['error' => 'Pengarang not found'], 404);
        }

        // Hapus data pengarang
        $pengarang->delete();

        // Kembalikan response bahwa data berhasil dihapus
        return response()->json();
    }

}
