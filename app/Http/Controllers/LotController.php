<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotController extends Controller
{
    public function searchByCategory($id) {
        return view('search', compact('id'));
    }
}
