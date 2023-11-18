<?php

namespace App\Http\Controllers;
use App\Models\Bet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BetController extends Controller
{
    public function addbet(Request $request) {

        $betData = $request->except('_token');

        $validator = Validator::make($betData, [
            'bet-price'=>'required',
            'lot-id'=>'required',
        ]);
        if ( $validator->fails() ) {
            return redirect( route('lot-page', ['id' => $betData["lot-id"]]) )
                ->withErrors($validator)
                ->withInput();
        }

        $bet = new Bet();
        $bet->bet_price = request('bet-price');
        $bet->lot_id = request('lot-id');
        $bet->author_id = Auth::user()->id;
        $bet->save();

        return redirect( route('lot-page', ['id' => $bet->lot_id]) );
    }
}
