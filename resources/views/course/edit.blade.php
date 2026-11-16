<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>

    <h1>Edit Course</h1>

    @if($errors->any())
        <div>
            <h3>Please fix the following errors:</h3>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div>
            <label>Course Name</label>

            <input type="text"
                   name="name"
                   value="{{ old('name', $course->name) }}">
        </div>

        <br>

        <div>
            <label>Description</label>

            <input type="text"
                   name="description"
                   value="{{ old('description', $course->description) }}">
        </div>

        <br>

        <div>
            <label>Duration (Weeks)</label>

            <input type="number"
                   name="duration"
                   value="{{ old('duration', $course->duration) }}">
        </div>

        <br>

        <div>
            <label>Fee</label>

            <input type="number"
                   step="0.01"
                   name="fee"
                   value="{{ old('fee', $course->fee) }}">
        </div>

        <br>

        <div>
            <label>Difficulty</label>

            <select name="difficulty">

                <option value="Easy"
                    {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>
                    Easy
                </option>

                <option value="Medium"
                    {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>

                <option value="Hard"
                    {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>
                    Hard
                </option>

            </select>
        </div>

        <br>

        <div>
            <label>Active Course?</label>

            <input type="hidden" name="is_active" value="0">

            <input type="checkbox"
                   name="is_active"
                   value="1"
                   {{ old('is_active', $course->is_active) == 1 ? 'checked' : '' }}>
        </div>

        <br>

        <button type="submit">Update Course</button>

    </form>

    <br>

    <a href="{{ route('courses.index') }}">Back to Courses</a>

</body>
</html>