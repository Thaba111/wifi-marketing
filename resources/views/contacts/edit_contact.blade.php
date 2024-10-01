<form action="{{ route('contacts.update', $contact->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <input type="text" name="name" value="{{ $contact->name }}" placeholder="Contact Name" required>
    <input type="email" name="email" value="{{ $contact->email }}" placeholder="Email" required>
    <input type="text" name="phone" value="{{ $contact->phone_number }}" placeholder="Phone" required>

    <h3>Segments</h3>
    <div id="segments">
        @foreach($contact->segments as $segment)
            <div>
                <input type="text" name="segments[{{ $segment->id }}][name]" value="{{ $segment->name }}" placeholder="Segment Name" required>
                <input type="text" name="segments[{{ $segment->id }}][criteria]" value="{{ $segment->criteria }}" placeholder="Criteria" required>
                <input type="hidden" name="segments[{{ $segment->id }}][_method]" value="PUT">
            </div>
        @endforeach

        <!-- Dropdown for existing segments -->
        <div>
            <label for="segment_id">Existing Segment</label>
            <select name="segment_id" id="segment_id">
                <option value="">Select Existing Segment</option>
                @foreach($segments as $segment)
                    <option value="{{ $segment->id }}">{{ $segment->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Input for adding a new segment -->
        <div>
            <input type="text" name="segments[new][name]" placeholder="New Segment Name">
            <input type="text" name="segments[new][criteria]" placeholder="New Criteria">
        </div>
    </div>

    <button type="submit">Update Contact</button>
</form>
