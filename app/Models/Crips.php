<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crips extends Model
{
    use HasFactory;
    protected $table = 'crips';
    protected $fillable = ['kriteria_id', 'nama_crips', 'bobot'];
}
