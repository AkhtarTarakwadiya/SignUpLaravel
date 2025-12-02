<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<h2>Signup Form</h2>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('signup.store') }}">
    @csrf

    <label>First Name:</label>
    <input type="text" name="first_name">
    <br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name">
    <br><br>

    <label>Email:</label>
    <input type="email" name="email">
    <br><br>

    <label>Phone:</label>
    <input type="text" name="phone">
    <br><br>

    <label>Address:</label>
    <textarea name="address"></textarea>
    <br><br>

    <button type="submit">Signup</button>
</form>

</body>
</html>
