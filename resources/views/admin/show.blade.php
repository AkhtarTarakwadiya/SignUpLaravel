<!DOCTYPE html>
<html>
<head>
    <title>Show User</title>
</head>
<body>

<h2>User Details</h2>

<p><strong>First Name:</strong> {{ $user->first_name }}</p>
<p><strong>Last Name:</strong> {{ $user->last_name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Phone:</strong> {{ $user->phone }}</p>
<p><strong>Address:</strong> {{ $user->address }}</p>

<br>
<a href="{{ route('admin.users') }}">
    <button>Back to List</button>
</a>

</body>
</html>
