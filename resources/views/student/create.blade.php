<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>

    <h1>Create Student</h1>

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

    <form action="{{ route('students.store') }}" method="POST">

        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <br>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <br>

        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>

        <br>

        <div>
            <label>Address</label>
            <textarea name="address">{{ old('address') }}</textarea>
        </div>

        <br>

        <div>
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}">
        </div>

        <br>

        <button type="submit">Create Student</button>

    </form>

    <br>

    <a href="{{ route('students.index') }}">Back to Students</a>

</body>
</html>