<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>

    <!-- Form to add new todo -->
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button type="submit">Add Todo</button>
    </form>

    <!-- Displaying the list of todos -->
    <ul>
        @foreach($todos as $todo)
            <li>
                <strong>{{ $todo->title }}</strong> - {{ $todo->description }}
                @if($todo->completed)
                    (Completed)
                @else
                    <a href="{{ route('todos.update', $todo->id) }}">Mark as Completed</a>
                @endif
                <a href="{{ route('todos.destroy', $todo->id) }}">Delete</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
