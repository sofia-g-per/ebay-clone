<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
        Carbon::setLocale('ru');
        $user = Auth::user();

        $bets = $user->bets;
        $bets->load('lot', 'author');
        $css_status = [
            'winner' => 'rates__item--win',
            'end' => 'rates__item--end'
        ];

        return view('profile', ['id' => $user->id, 'bets' => $bets, 'status' => $css_status]);
    }

}
