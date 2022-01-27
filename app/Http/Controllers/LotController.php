<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class LotController extends Controller
{
    public function searchByCategory($id) {
        $category = Category::findOrFail($id);
        $lots = $category->lots;

        return view('search', 
            [
                'category' => $category->title,
                'lots' => $lots
            ]
        );
    }
}
