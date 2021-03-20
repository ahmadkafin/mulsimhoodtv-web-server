<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PivotKategoriM extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tabel_pivot_kategori";
    protected $filable = [
        'kategori_id',
        'konten_id'
    ];

    public function konten_pivot() {
        return $this->belongsTo(KontenM::class, 'konten_id');
    }

    public function kategori_pivot() {
        return $this->belongsTo(KategoriM::class, 'kategori_id');
    }
}
