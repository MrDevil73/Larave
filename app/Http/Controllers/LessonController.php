<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Lesson;


class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        return view('pages/lesson', compact('lesson'));
    }
}
