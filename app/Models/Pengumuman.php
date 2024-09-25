<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    // Define the table if it doesn't follow Laravel's plural naming convention
    protected $table = 'pengumuman';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'link_sheet',
        'detail',
        'tanggal',
        'no_wa'
    ];
}
