<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'pelajaran', 'major'
    ];
};
