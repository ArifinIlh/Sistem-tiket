@if(isset($editTicket))
    <h2>Edit Tiket</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tickets.update', $editTicket->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ old('name', $editTicket->name) }}" required>
        <input type="email" name="email" value="{{ old('email', $editTicket->email) }}" required>
        <input type="text" name="title" value="{{ old('title', $editTicket->title) }}" required>
        <textarea name="description">{{ old('description', $editTicket->description) }}</textarea>

        <select name="ticket_type_id" required>
            @foreach($ticketTypes as $type)
                <option value="{{ $type->id }}" {{ $editTicket->ticket_type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>

        <select name="project_id" required>
            @foreach($projects as $project)
                <option value="{{ $project->id }}" {{ $editTicket->project_id == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>

        <input type="date" name="assign_at" value="{{ old('assign_at', $editTicket->assign_at) }}" required>

        <select name="status" required>
            <option value="open" {{ $editTicket->status == 'open' ? 'selected' : '' }}>Open</option>
            <option value="progress" {{ $editTicket->status == 'progress' ? 'selected' : '' }}>Progress</option>
            <option value="closed" {{ $editTicket->status == 'closed' ? 'selected' : '' }}>Closed</option>
            <option value="cancel" {{ $editTicket->status == 'cancel' ? 'selected' : '' }}>Cancel</option>
        </select>

        <button type="submit">Update Tiket</button>
    </form>
@endif
