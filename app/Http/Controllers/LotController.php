<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Lot;

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

    public function search(Request $request) {

        $search = trim($request->search);

        $lots = Lot::whereRaw('MATCH (title, description) AGAINST (?)', [$search])->get();

        return view('search', compact('search', 'lots'));
    }
}
