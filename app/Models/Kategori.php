<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['nama'];
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = false;
    
    public function buku()
    {
        return $this->hasMany(Buku::class, 'kategori_id');
    }
}
