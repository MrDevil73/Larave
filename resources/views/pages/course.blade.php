
    <h1 style="text-align: center"> {{ $course->title }}</h1>
    <p style="text-align: center">{{ $course->description }}</p>

    <h2 style="text-align: center">Уроки:</h2>
    <ul >
        @foreach($course->lessons as $lesson)
            <li style="text-align: center"><a href="{{ route('lessons.show', $lesson) }}">{{ $lesson->title }}</a></li>
        @endforeach
    </ul>

    @if (auth()->check())
        <form action="{{ route('courses.complete', $course) }}" method="POST" style="text-align: center">
            @csrf
            <button type="submit">Завершить курс</button>
        </form>
    @endif

