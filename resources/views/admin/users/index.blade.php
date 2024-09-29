@foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->is_suspended ? 'Yes' : 'No' }}</td>
        <td>{{ $user->suspension_reason ?? 'N/A' }}</td> <!-- Display reason if exists -->
        <td>
            <form action="{{ route('admin.suspend', $user->id) }}" method="POST">
                @csrf
                <label for="reason">Reason for Suspension:</label>
                <textarea name="reason" required></textarea>
                <button type="submit">Suspend User</button>
            </form>
        </td>
    </tr>
@endforeach