
    <h1>{{ $lesson->title }}</h1>
    <p>{{ $lesson->content }}</p>

    <a href="{{ route('courses.show', $lesson->course) }}">Вернуться к курсу</a>
    </div>

