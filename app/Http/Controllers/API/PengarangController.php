<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengarang;

class PengarangController extends Controller
{
    // Create Pengarang
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $pengarang = Pengarang::create($request->all());

        return response()->json($pengarang, 201);
    }

    // Update Pengarang
    public function update(Request $request, $id)
    {
        $pengarang = Pengarang::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $pengarang->update($request->all());

        return response()->json($pengarang, 200);
    }

    // Delete Pengarang
    public function destroy($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        $pengarang->delete();

        return response()->json(null, 204);
    }
}
