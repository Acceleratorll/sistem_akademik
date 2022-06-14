<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mapela extends Model
{
    protected $table = 'mapela';
    use HasFactory;
    protected $fillable = [
        'mahasiswa_id',
        'pelajaran_id'
    ];
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class);
    }
}
