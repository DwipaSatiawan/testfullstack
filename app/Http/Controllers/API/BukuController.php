<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pengarang;

class BukuController extends Controller
{
    // Create Buku
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required',
            'pengarang_id' => 'required',
            'tahun' => 'required|integer',
        ]);

        $buku = Buku::create($request->all());

        return response()->json($buku, 201);
    }

    // Update Buku
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required',
            'pengarang_id' => 'required',
            'tahun' => 'required|integer',
        ]);

        $buku->update($request->all());

        return response()->json($buku, 200);
    }

    // Delete Buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return response()->json(null, 204);
    }
}
