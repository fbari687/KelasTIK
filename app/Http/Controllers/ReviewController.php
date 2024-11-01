<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:255'
        ]);

        $storedData = Review::create([
            'user_id' => Auth::user()->id,
            'course_id' => $request->course_id,
            'body' => $request->body
        ]);

        return back();
    }
}
