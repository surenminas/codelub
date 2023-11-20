<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';
    protected $fillable = [
        'title',
        'img_path',
        'album_id',
    ];
    protected $with = ['album'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}
