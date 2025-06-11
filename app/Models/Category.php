<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        use HasFactory;
        protected $fillable = ['name', 'description'];

        // Relasi Category dengan Budaya
        public function budayas()
        {
                return $this->hasMany(Budaya::class);
        }
}
