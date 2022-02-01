<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    public function index()
    {
        $lots = Lot::orderBy("id", "desc")->take(6)->get();

        return view('index', compact('lots'));
    }

    public function single($id) {

        $lot = Lot::findOrFail($id);

        return view('single-lot', compact('lot'));
    }
    
    public function signup() {
        return view('sign-up');
    }

    public function login() {
        return view('login');
    }

    public function addlot() {
        
        return view('add-lot');
    }

    public function profile() {
        
        return view('profile');
    }

}
