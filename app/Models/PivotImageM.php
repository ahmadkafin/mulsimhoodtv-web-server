<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PivotImageM extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tabel_pivot_images";
    protected $fillable = [
        'image_id',
        'konten_id'
    ];

    public function i_pivot() {
        return $this->belongsTo(GalleryM::class, 'image_id');
    }

    public function kon_pivot() {
        return $this->belongsTo(KontenM::class, 'konten_id');
    }
}
