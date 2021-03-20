<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriM extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tabel_kategori";
    protected $fillable = [
        'kategori_id', 'kategori_name', 'kategori_status'
    ];

    public function pivot_kat(){
        return $this->hasMany(PivotKategoriM::class, 'kategori_id');
    }
}
