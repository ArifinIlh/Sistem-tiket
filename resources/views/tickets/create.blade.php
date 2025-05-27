<style>
  .form-create {
    max-width: 700px;
    margin: 0 auto;
    background: white;
    padding: 30px 35px;
    border-radius: 16px;
    box-shadow: 0 12px 24px rgba(0,0,0,0.08);
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .form-create .form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .form-create input[type="text"],
  .form-create input[type="email"],
  .form-create input[type="date"],
  .form-create select,
  .form-create textarea {
    padding: 14px 16px;
    font-size: 1rem;
    border: 1.8px solid #cbd5e1;
    border-radius: 10px;
    transition: all 0.3s ease;
    font-family: 'Segoe UI', sans-serif;
  }

  .form-create input:focus,
  .form-create select:focus,
  .form-create textarea:focus {
    border-color: #1e88e5;
    outline: none;
    box-shadow: 0 0 8px rgba(30,136,229,0.3);
  }

  .form-create textarea {
    min-height: 120px;
    resize: vertical;
  }

  .form-create label {
    font-weight: 600;
    color: #333;
    font-size: 0.95rem;
  }

  .btn-submit {
    background-color: #1e88e5;
    color: white;
    padding: 14px 28px;
    font-size: 1rem;
    font-weight: 700;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 5px 15px rgba(30,136,229,0.4);
    align-self: flex-start;
  }

  .btn-submit:hover {
    background-color: #1565c0;
    box-shadow: 0 8px 22px rgba(21,101,192,0.6);
  }

  .success-message {
    max-width: 600px;
    margin: 0 auto 20px;
    background-color: #d1e7dd;
    border: 1.5px solid #0f5132;
    color: #0f5132;
    padding: 14px 20px;
    border-radius: 10px;
    font-weight: 600;
    box-shadow: 0 5px 12px rgba(15,81,50,0.3);
  }

  .error-message {
    max-width: 600px;
    margin: 0 auto 20px;
    background-color: #f8d7da;
    border: 1.5px solid #842029;
    color: #842029;
    padding: 14px 20px;
    border-radius: 10px;
    font-weight: 600;
    box-shadow: 0 5px 12px rgba(132,32,41,0.2);
  }

  .error-message ul {
    margin: 0;
    padding-left: 20px;
  }

  @media (max-width: 768px) {
    .form-create {
      padding: 20px;
    }
    .btn-submit {
      width: 100%;
      text-align: center;
    }
  }
</style>





@if(session('success'))
  <p class="success-message">{{ session('success') }}</p>
@endif

@if ($errors->any())
  <div class="error-message">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('tickets.store') }}" class="form-create">
  @csrf

  <div class="form-group">
    <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
  </div>

  <div class="form-group">
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
  </div>

  <div class="form-group">
    <input type="text" name="title" placeholder="Judul Masalah" value="{{ old('title') }}" required>
  </div>

  <div class="form-group">
    <textarea name="description" placeholder="Deskripsi (opsional)">{{ old('description') }}</textarea>
  </div>

  <div class="form-group">
    <label>Jenis Tiket</label>
    <select name="ticket_type_id" required>
      <option value="">-- Pilih Jenis Tiket --</option>
      @foreach($ticketTypes as $type)
        <option value="{{ $type->id }}" {{ old('ticket_type_id') == $type->id ? 'selected' : '' }}>
          {{ $type->name }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label>Proyek Terkait</label>
    <select name="project_id" required>
      <option value="">-- Pilih Proyek --</option>
      @foreach($projects as $project)
        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
          {{ $project->name }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label>Tanggal Masalah</label>
    <input type="date" name="assign_at" value="{{ old('assign_at') }}" required>
  </div>

  <button type="submit" class="btn-submit">Kirim Tiket</button>
</form>
