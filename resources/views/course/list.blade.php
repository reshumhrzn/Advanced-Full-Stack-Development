<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
</head>
<body>

    <h1>Courses</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('courses.create') }}">Create Course</a>

    <br><br>

    <table border="1" cellpadding="10">

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($courses as $course)

                <tr>

                    <td>{{ $course->id }}</td>

                    <td>{{ $course->name }}</td>

                    <td>{{ $course->duration }} weeks</td>

                    <td>{{ $course->fee }}</td>

                    <td>{{ $course->difficulty }}</td>

                    <td>
                        {{ $course->is_active ? 'Active' : 'Inactive' }}
                    </td>

                    <td>

                        <a href="{{ route('courses.show', $course->id) }}">
                            View
                        </a>

                        |

                        <a href="{{ route('courses.edit', $course->id) }}">
                            Edit
                        </a>

                        |

                        <form action="{{ route('courses.destroy', $course->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Are you sure you want to delete this course?')">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7">No courses found.</td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <br>

    <a href="{{ route('students.index') }}">View Students</a>

</body>
</html>