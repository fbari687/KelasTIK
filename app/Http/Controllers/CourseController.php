<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Review;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::all();

        if ($request->category) {
            $category = Category::where('slug', $request->category)->first();
            $courses = Course::where('category_id', $category->id)->get();
        }

        if ($request->search) {
            $search = $request->search;
            $courses = Course::where('title', 'like', "%{$search}%")
                ->orWhere('sub_title', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->get();
        }

        return view('pages.course.index', [
            'courses' => $courses,
            'categories' => Category::all(),
        ]);
    }

    public function detail(string $slug)
    {
        $course = Course::where('slug', $slug)->first();

        if (Auth::check()) {
            if (Auth::user()->id == $course->id_pengajar) {
                return redirect('/');
            }
        }

        return view('pages.course.detail', [
            'course' => $course,
            'reviews' => Review::where('course_id', $course->id)->latest()->get()
        ]);
    }

    public function enroll(string $slug)
    {
        $course = Course::where('slug', $slug)->first();

        $enrollCourse = UserCourse::create([
            'course_id' => $course->id,
            'user_id' => Auth::user()->id
        ]);

        if ($enrollCourse) {
            toast('Berhasil mengikuti kursus', 'success');
            return redirect()->back();
        } else {
            toast('Gagal mengikuti kursus', 'error');
            return redirect()->back();
        }
    }
}
