<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function lot() {
        return $this->belongsTo('App\Models\Lot');
    }

    public function author() {
        return $this->belongsTo('App\Models\User');
    }
}
