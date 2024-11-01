<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(string $nim)
    {
        // Profile saya
        if (Auth::check() && Auth::user()->nim == $nim) {
            return view('pages.profile.index', [
                'userCourses' => UserCourse::where('user_id', Auth::user()->id)->get()
            ]);
        } else {
            // Profile tutor
            $user = User::where('nim', $nim)->first();
            return view('pages.profile.profile-tutor', [
                'user' => $user,
                'courses' => $user->courses
            ]);
        }
    }

    public function changeProfile(Request $request, string $nim)
    {
        $user = User::where('nim', $nim)->first();

        $image = $request->file('image')->store('profile');
        $updatedUser = $user->update([
            'image' => $image,
            'bio' => $request->bio
        ]);

        if ($updatedUser) {
            toast('Berhasil mengubah profil', 'success');
            return redirect()->back();
        } else {
            toast('Gagal mengubah profil, silakan coba lagi', 'error');
            return redirect()->back();
        }
    }
}
