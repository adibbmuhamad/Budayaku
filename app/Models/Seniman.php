<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seniman extends Model
{
    use HasFactory;

    protected $table = 'senimans';

    protected $fillable = [
        'name',
        'biography',
        'birthplace',
        'birth_date',
        'image'
    ];
}
