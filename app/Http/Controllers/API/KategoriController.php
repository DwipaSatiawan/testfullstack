<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    // Create Kategori
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori = Kategori::create($request->all());

        return response()->json($kategori, 201);
    }

    // Update Kategori
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori->update($request->all());

        return response()->json($kategori, 200);
    }

    // Delete Kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return response()->json(null, 204);
    }
}
