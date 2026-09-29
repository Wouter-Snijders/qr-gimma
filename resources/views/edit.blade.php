<!DOCTYPE html>
<html>
<head>
    <title>Student bewerken</title>
</head>
<body>
    <h1>Student bewerken</h1>

    @if ($errors->any())
        <div>
            <strong>Er is iets verkeerd ingevuld:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('student.update', $student) }}">
        @csrf
        @method('PUT')

        <label for="student_number">Studentnummer</label>
        <input type="text" id="student_number" name="student_number" value="{{ old('student_number', $student->student_number) }}">

        <br><br>

        <label for="name">Naam</label>
        <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}">

        <br><br>

        <button type="submit">Opslaan</button>
    </form>

    <br>
    <a href="{{ route('student.show', $student) }}">Terug naar overzicht</a>
</body>
</html>
