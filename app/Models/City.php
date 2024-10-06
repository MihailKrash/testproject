<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

        // Заполняемые поля
        protected $fillable = ['name', 'slug', 'region_id'];

        // Указываем отношение "многие к одному" (город принадлежит одному региону)
        public function region()
        {
            return $this->belongsTo(Region::class, 'region_id', 'id');
        }
}
