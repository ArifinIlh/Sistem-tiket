<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Admin</title>
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
      color: #333;
    }

    /* Navbar */
    nav {
      background-color: #1e88e5;
      padding: 1rem 2rem;
      box-shadow: 0 3px 8px rgba(30,136,229,0.3);
      position: sticky;
      top: 0;
      z-index: 999;
    }
    .nav-container {
      max-width: 1100px;
      margin: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .nav-brand {
      font-weight: 700;
      font-size: 1.6rem;
      color: white;
      text-decoration: none;
      letter-spacing: 0.05em;
    }
    .nav-menu {
      display: flex;
      gap: 24px;
    }
    .nav-menu a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      transition: color 0.3s ease;
    }
    .nav-menu a:hover,
    .nav-menu a:focus {
      color: #bbdefb;
    }
    .nav-toggle {
      display: none;
      flex-direction: column;
      cursor: pointer;
      gap: 5px;
    }
    .nav-toggle span {
      width: 25px;
      height: 3px;
      background: white;
      border-radius: 2px;
      transition: 0.3s;
    }
    @media (max-width: 768px) {
      .nav-menu {
        position: absolute;
        top: 60px;
        right: 0;
        background: #1e88e5;
        flex-direction: column;
        width: 200px;
        padding: 1rem;
        border-radius: 0 0 0 8px;
        box-shadow: 0 5px 20px rgba(30,136,229,0.3);
        transform: translateX(100%);
        transition: transform 0.3s ease;
        pointer-events: none;
        user-select: none;
        z-index: 998;
      }
      .nav-menu.active {
        transform: translateX(0);
        pointer-events: auto;
        user-select: auto;
      }
      .nav-toggle {
        display: flex;
      }
    }

    .container {
      max-width: 1100px;
      margin: 30px auto;
      padding: 30px 40px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 12px 25px rgba(0,0,0,0.1);
      border: 1px solid #e2e8f0;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 30px;
      font-weight: 700;
      color: #2c3e50;
      text-align: center;
    }

    .alert-success {
      background-color: #d1e7dd;
      color: #0f5132;
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 25px;
      font-weight: 600;
      border-left: 6px solid #198754;
    }

    .card {
      margin-bottom: 30px;
      padding: 25px 30px;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      background: #fafbfd;
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    .card h3 {
      margin-bottom: 20px;
      color: #34495e;
      font-size: 1.5rem;
      border-bottom: 2px solid #3498db;
      padding-bottom: 8px;
    }

    ul {
      padding-left: 20px;
      font-size: 1.1rem;
      color: #555;
    }

    ul li {
      margin-bottom: 8px;
      font-weight: 600;
    }

    .table-responsive {
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      margin-top: 10px;
      border-radius: 10px;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 10px;
      font-size: 1rem;
      min-width: 800px;
    }

    thead tr {
      background-color: #3498db;
      color: white;
    }

    thead tr th {
      padding: 14px 20px;
      text-align: left;
    }

    tbody tr {
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    tbody tr:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.12);
    }

    tbody tr td {
      padding: 14px 20px;
      vertical-align: middle;
    }

    .actions {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .actions a, .actions button {
      font-weight: 600;
      font-size: 0.95rem;
      cursor: pointer;
      border-radius: 6px;
      padding: 6px 14px;
      border: 2px solid transparent;
      text-decoration: none;
    }

    .actions a {
      color: #2e86de;
      background-color: #d6eaff;
      border-color: #2e86de;
    }

    .actions a:hover {
      background-color: #2e86de;
      color: white;
    }

    .actions button {
      color: #e74c3c;
      background-color: #fddede;
      border-color: #e74c3c;
      border: 2px solid;
    }

    .actions button:hover {
      background-color: #e74c3c;
      color: white;
    }

    .edit-section {
      margin-top: 40px;
      padding-top: 20px;
      border-top: 3px solid #3498db;
    }
  </style>
</head>
<body>

<nav>
  <div class="nav-container">
    <a href="#" class="nav-brand">Sistem Tiket</a>
    <div class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false" role="button" tabindex="0">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div class="nav-menu" id="navMenu">
      <a href="{{ route('admin.dashboard') }}">Dashboard</a>
      <a href="{{ route('tickets.index') }}">Kelola Tiket</a>
    </div>
  </div>
</nav>

<div class="container">
  <h1>Dashboard Admin</h1>

  @if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <p style="font-size: 1.3rem;">Total Tiket: <strong>{{ $totalTickets }}</strong></p>
  </div>

  <div class="card">
    <h3>Jumlah Tiket per Status</h3>
    <ul>
      <li>Open: {{ $statusCounts->get('open', 0) }}</li>
      <li>Progress: {{ $statusCounts->get('progress', 0) }}</li>
      <li>Closed: {{ $statusCounts->get('closed', 0) }}</li>
      <li>Cancel: {{ $statusCounts->get('cancel', 0) }}</li>
    </ul>
  </div>

  <div class="card">
    <h3>5 Tiket Terbaru</h3>
    <div class="table-responsive">
      <table>
        <thead>
          <tr>
            <th>Nama</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Jenis Tiket</th>
            <th>Proyek</th>
            <th>Tanggal Masalah</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($latestTickets as $ticket)
            <tr>
              <td>{{ $ticket->name }}</td>
              <td>{{ $ticket->title }}</td>
              <td>{{ ucfirst($ticket->status) }}</td>
              <td>{{ $ticket->ticketType->name ?? '-' }}</td>
              <td>{{ $ticket->project->name ?? '-' }}</td>
              <td>{{ $ticket->assign_at }}</td>
              <td class="actions">
                <a href="{{ route('admin.dashboard.edit', $ticket->id) }}">Edit</a>
                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus tiket ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @if(isset($editTicket))
    <div class="card edit-section">
      @include('admin.partials.edit-ticket')
    </div>
  @endif
</div>

<script>
  const toggle = document.getElementById("navToggle");
  const menu = document.getElementById("navMenu");

  toggle.addEventListener("click", () => {
    menu.classList.toggle("active");
  });

  toggle.addEventListener("keypress", (e) => {
    if (e.key === "Enter") menu.classList.toggle("active");
  });
</script>

</body>
</html>
