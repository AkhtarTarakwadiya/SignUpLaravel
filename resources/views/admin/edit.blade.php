<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST" action="{{ route('admin.users.update', $user->id) }}">
    @csrf

    <label>First Name:</label>
    <input type="text" name="first_name" value="{{ $user->first_name }}">
    <br><br>

    <label>Last Name:</label>
    <input type="text" name="last_name" value="{{ $user->last_name }}">
    <br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $user->email }}">
    <br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ $user->phone }}">
    <br><br>

    <label>Address:</label>
    <textarea name="address">{{ $user->address }}</textarea>
    <br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
