<style>
.form-container {
    background: #fff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    max-width: 700px;
    margin: 40px auto;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
}

.form-container h2 {
    margin-bottom: 25px;
    font-weight: 700;
    font-size: 28px;
    color: #0d6efd;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #555;
    letter-spacing: 0.02em;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="date"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1.8px solid #ced4da;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.3s ease;
    font-family: inherit;
    box-sizing: border-box;
}

.form-group input[type="text"]:focus,
.form-group input[type="email"]:focus,
.form-group input[type="date"]:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #0d6efd;
    box-shadow: 0 0 8px rgba(13, 110, 253, 0.3);
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
}

.form-actions {
    margin-top: 30px;
    text-align: center;
}

.form-actions button,
.form-actions a {
    padding: 12px 28px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease;
    cursor: pointer;
    display: inline-block;
    min-width: 120px;
    border: none;
}

.form-actions button {
    background-color: #0d6efd;
    color: #fff;
    box-shadow: 0 4px 12px rgba(13, 110, 253, 0.4);
}

.form-actions button:hover {
    background-color: #084cd9;
    box-shadow: 0 6px 16px rgba(8, 76, 217, 0.6);
}

.form-actions a {
    background-color: #e9ecef;
    color: #495057;
    border: 1.5px solid #adb5bd;
    margin-left: 15px;
}

.form-actions a:hover {
    background-color: #ced4da;
    color: #212529;
    border-color: #868e96;
}

</style>

@if(isset($editTicket))
    <h2>Edit Tiket</h2>
    <form method="POST" action="{{ route('tickets.update', $editTicket->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" value="{{ old('name', $editTicket->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $editTicket->email) }}" required>
        </div>

        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" name="title" value="{{ old('title', $editTicket->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description">{{ old('description', $editTicket->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="ticket_type_id">Jenis Tiket</label>
            <select name="ticket_type_id" required>
                @foreach($ticketTypes as $type)
                    <option value="{{ $type->id }}" {{ old('ticket_type_id', $editTicket->ticket_type_id) == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="project_id">Proyek</label>
            <select name="project_id" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id', $editTicket->project_id) == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="assign_at">Tanggal Masalah</label>
            <input type="date" name="assign_at" value="{{ old('assign_at', $editTicket->assign_at) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" required>
                @foreach(['open', 'progress', 'closed', 'cancel'] as $status)
                    <option value="{{ $status }}" {{ old('status', $editTicket->status) == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-actions">
            <button type="submit">Simpan Perubahan</button>
            <a href="{{ route('admin.dashboard') }}">Batal</a>
        </div>
    </form>
@endif
