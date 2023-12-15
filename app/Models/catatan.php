<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catatan extends Model
{
    use HasFactory;

    protected $fillable = [         
        'kategori_id',         
        'judul',         
        'kegiatan',    
    ];

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
}
