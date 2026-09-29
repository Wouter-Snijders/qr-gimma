<!DOCTYPE html>
<html>
<head>
    <title>Alle studenten</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Alle studenten</h1>

    <a href="{{ route('student.create') }}">Nieuwe student toevoegen</a>


    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Studentnummer</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->student_number }}</td>
                    <td>
                        <a href="{{ route('student.show', $student) }}">Bekijk</a> |
                        <a href="{{ route('student.edit', $student) }}">Bewerken</a> |
                        <form method="POST" action="{{ route('student.destroy', $student) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
