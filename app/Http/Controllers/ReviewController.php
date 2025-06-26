<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([
            'point' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $review = new Review();
        $review->user_id =  auth()->user()->id;
        $review->product_id = $req->product_id;
        $review->point = $req->point;
        $review->comment = $req->comment;
        $review->save();

        toast('Terimakasih atas ulasan Anda!!', 'success');
        return back();
    }
}
