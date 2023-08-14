<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Vote;

class VoteController extends Controller
{
    public function index()
    {
        $votes = Vote::all();
        return view('vote.index', compact('votes'));
    }

    public function create($id)
    {
        $contents = Content::findOrFail($id);
        return view('vote.form', compact('contents'));
    }

    public function store(Request $request)
    {
        $vote = new Vote;
        $vote->voteStatus = $request->voteStatus;
        $vote->content_id = $request->content_id;
        $vote->save();

        $contents = Content::paginate(5);
        return view('content.index', compact('contents'));
    }
}
