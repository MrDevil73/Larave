<a href="{{ route('logout') }}" style="text-align: right">Выйти</a>

<div class="container my-4" style="text-align: center">
        <h1 class="text-center mb-4" >Список курсов</h1>

        @foreach($coursesWithCompletionStatus as $course)
            <div class="card mb-3">
                <div class="card-body">
                    <a href="{{ route('courses.show', $course) }}" class="text-decoration-none">
                        <h4 class="card-title">{{ $course->title }} @if ($course->isCompleted) (Завершен) @endif</h4>
                    </a>
                    <p class="card-text">{{$course->description}}</p>
                </div>
            </div>
        <br>
        <br>
    @endforeach

    <!-- Кнопка "Выйти" в правом верхнем углу -->
    </div>
