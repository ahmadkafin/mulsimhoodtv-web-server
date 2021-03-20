<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KontenM extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tabel_konten';
    protected $fillable = [
        'konten_id',
        'konten_slugs',
        'konten_title',
        'konten_body',
        'konten_video',
        'konten_status'
    ];

    public function pivot_kon_kat(){
        return $this->hasMany(PivotKategoriM::class, 'konten_id');
    }

    public function pivot_kon_i() {
        return $this->hasMany(PivotImageM::class, 'konten_id');
    }
}
