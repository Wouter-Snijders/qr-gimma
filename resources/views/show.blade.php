<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
</head>
<body>
    <h1>Student</h1>

    <p><strong>Naam:</strong> {{ $student->name }}</p>
    <p><strong>Studentnummer:</strong> {{ $student->student_number }}</p>

    <a href="{{ route('student.edit', $student) }}">Bewerken</a>

    <form method="POST" action="{{ route('student.destroy', $student) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Verwijderen</button>
    </form>

    <br><br>
    <a href="{{ route('student.index') }}">Terug</a>
</body>
</html>
