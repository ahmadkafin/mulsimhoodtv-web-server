<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryM extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "tabel_gallery";
    protected $fillable = [
        'hash_image', 'alt_image'
    ];

    public function pivot_i() {
        return $this->hasOne(PivotImage::class, 'image_id');
    }
}
