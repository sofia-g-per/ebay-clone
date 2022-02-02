<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    public $timestamps = false;

    //чтобы обеспечить связь: у одного лота может быть только одна категория
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function bets() {
        return $this->hasMany('App\Models\Bet');

    }
}
