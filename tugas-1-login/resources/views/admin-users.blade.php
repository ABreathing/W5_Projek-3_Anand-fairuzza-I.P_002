<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Role</title>
    <style>
        body { font-family: sans-serif; max-width: 700px; margin: 3rem auto; padding: 0 1rem; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        .ok { background: #e8f8ee; color: #1e8449; padding: 8px; border-radius: 4px; margin-bottom: 12px; }
        .error { background: #fde8e8; color: #c0392b; padding: 8px; border-radius: 4px; margin-bottom: 12px; }
    </style>
</head>
<body>
    <h1>Kelola Role User</h1>
    <p><a href="{{ route('dashboard') }}">Kembali ke dashboard</a></p>

    @if (session('status'))
        <div class="ok">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <table>
        <tr>
            <th>Username</th>
            <th>Nama</th>
            <th>Role</th>
            <th>Ubah role</th>
        </tr>
        @foreach ($users as $u)
            <tr>
                <td>{{ $u->username }}</td>
                <td>{{ $u->nama_lengkap }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    @if ($u->role === 'admin')
                        -
                    @else
                        <form method="POST" action="{{ route('admin.users.role.update', $u) }}">
                            @csrf
                            @method('PATCH')
                            <select name="role">
                                <option value="customer" @selected($u->role === 'customer')>customer</option>
                                <option value="staff" @selected($u->role === 'staff')>staff</option>
                            </select>
                            <button type="submit">Simpan</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>