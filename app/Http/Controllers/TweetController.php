<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
    public function index() {
        $tweets = Tweet::with('user', 'likes', 'retweets')->latest()->get();
        return view('tweets.index', compact('tweets'));
    }

    public function store(Request $request) {
        $request->validate(['content'=>'required|max:280']);
        Tweet::create(['user_id'=>Auth::id(),'content'=>$request->content]);
        return back();
    }

    public function like(Tweet $tweet){
        if(!$tweet->likes()->where('user_id',Auth::id())->exists()){
            $tweet->likes()->create(['user_id'=>Auth::id()]);
        }
        return back();
    }

    public function retweet(Tweet $tweet){
        if(!$tweet->retweets()->where('user_id',Auth::id())->exists()){
            $tweet->retweets()->create(['user_id'=>Auth::id()]);
        }
        return back();
    }
}
