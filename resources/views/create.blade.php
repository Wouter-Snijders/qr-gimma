<!DOCTYPE html>
<html>
<head>
    <title>QR Game</title>
</head>
<body>

    <h1>Welkom bij de QR Game!</h1>

    <p>Vul je gegevens in om te beginnen.</p>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

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


    <form method="POST" action="{{ route('student.store') }}">
    @csrf
        <label for="student_number">Studentnummer</label>
        <input type="text" id="student_number" name="student_number" value="{{ old('student_number') }}">

        <br><br>

        <label for="name">Naam</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">

        <br><br>

        <button type="submit">Start spel</button>
    </form>

</body>
</html>
