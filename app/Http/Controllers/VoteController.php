<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Vote;

class VoteController extends Controller {
    public function showAll() {
        $votes = Vote::all();
        return view('index', ['votes' => $votes]);
    }

    public function create(Request $request) {
        $vote = new Vote;
        $vote->title = $request->title;
        $vote->text = $request->text;
        $vote->positive = 0;
        $vote->negative = 0;
        $vote->save();
        return redirect('/');
    }

    public function increasePositive($id) {
        $vote = Vote::where('id', $id)->first();
        $vote->positive++;
        $vote->save();
        return back();
    }

    public function increaseNegative($id) {
        $vote = Vote::where('id', $id)->first();
        $vote->negative++;
        $vote->save();
        return back();
    }

    public function view_vote($id) {
        $vote = Vote::where('id', $id)->first();
        return view('show_vote', ['vote' => $vote]);
    }
}
