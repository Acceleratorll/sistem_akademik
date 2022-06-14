<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelajaran extends Model
{
    protected $table = 'pelajaran';
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id',
        'nama_pelajaran'
    ];

     public function Mapela()
    {
        return $this->hasMany(Mapela::class);
    }
}
