<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Filament\Forms\Components\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // dd(User::whereHas('roles', function (Builder $q) {
        //     return $q->where('name', 'pengajar');
        // }));

        if (Auth::check()) {
            $courses = Course::where('id_pengajar', '!=', Auth::user()->id)->get();
        } else {
            $courses = Course::all();
        }

        return view('home', [
            'courses' => $courses,
            'pengajars' => User::with('roles')->get()->filter(
                fn($user) => $user->roles->where('name', 'pengajar')->toArray()
            )->take(3),
            'reviews' => Review::take(6)->get()
        ]);
    }
}
