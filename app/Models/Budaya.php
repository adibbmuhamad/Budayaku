<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
        use HasFactory;
        protected $fillable = ['name', 'description', 'origin', 'image', 'category_id'];

        // Relasi Budaya dengan Category
        public function category()
        {
                return $this->belongsTo(Category::class);
        }

}
