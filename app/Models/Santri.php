<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    protected $table = 'santri';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'nama', 'jk', 'tempat', 'tgllahir', 'handphone', 'email', 'alamat', 'bukti_transfer'
    ];
}
