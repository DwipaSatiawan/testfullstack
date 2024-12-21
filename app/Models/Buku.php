<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';  // Nama tabel
    protected $primaryKey = 'id';  // Primary key tabel
    protected $fillable = ['judul', 'kategori_id', 'pengarang_id', 'tahun'];  // Kolom yang boleh diisi massal
    public $incrementing = true;  // Auto incrementing id
    protected $keyType = 'integer';  // Tipe key 'integer' (default)
    public $timestamps = false;  // Tidak menggunakan timestamps
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class, 'pengarang_id');
    }
}
