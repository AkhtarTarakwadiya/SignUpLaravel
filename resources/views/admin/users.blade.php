<!DOCTYPE html>
<html>
<head>
    <title>Admin - Users List</title>
</head>
<body>

<h2>All Registered Users</h2>

<table border="1" cellpadding="8">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Actions</th>
    </tr>

    @foreach($users as $user)
    <tr>
        <td>{{ $user->first_name }}</td>
        <td>{{ $user->last_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->address }}</td>
        <td>
            <a href="{{ route('admin.users.show', $user->id) }}">
                <button>Show</button>
            </a>

            <a href="{{ route('admin.users.edit', $user->id) }}">
                <button>Edit</button>
            </a>

            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>

</body>
</html>
