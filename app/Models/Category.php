<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    //чтобы обеспечить зависимость: у одной категории может быть множество постов
    public function lots() {
        return $this->hasMany('App\Models\Lot');
    }
}
