<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'nim', 'major_id'
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
};
