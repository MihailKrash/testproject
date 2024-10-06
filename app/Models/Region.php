<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

        // Заполняемые поля
        protected $fillable = ['name', 'slug', 'region_id'];

        // Указываем отношение "один ко многим" (регион имеет много городов)
        public function cities()
        {
            return $this->hasMany(City::class, 'region_id', 'id');
        }
}
