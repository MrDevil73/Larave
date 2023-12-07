<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;


class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        $user = auth()->user();
        $completedCourses = $user->completedCourses->pluck('id')->all();

        $coursesWithCompletionStatus = $courses->map(function ($course) use ($completedCourses) {
            $isCompleted = in_array($course->id, $completedCourses);
            $course->isCompleted = $isCompleted;
            return $course;
        });
        return view('pages/courses', compact('coursesWithCompletionStatus'));
    }

    public function show(Course $course)
    {
        return view('pages/course', compact('course'));
    }

    public function complete(Request $request, Course $course)
    {
        // Помечаем курс как завершенный для текущего пользователя
        $user = auth()->user();
        $user->completedCourses()->attach($course);

        return redirect()->route('courses.index')->with('success', 'Вы успешно завершили курс!');

    }
}
