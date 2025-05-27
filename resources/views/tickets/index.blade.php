<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar Tiket</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f7fa;
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
    .nav-menu a:hover {
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
      }
      .nav-menu.active {
        transform: translateX(0);
        pointer-events: auto;
      }
      .nav-toggle {
        display: flex;
      }
    }

    /* Container */
    .container {
      max-width: 1100px;
      margin: 30px auto;
      background: white;
      padding: 30px 40px;
      border-radius: 14px;
      box-shadow: 0 12px 28px rgba(0,0,0,0.1);
    }

    h2 {
      font-size: 2.4rem;
      color: #222;
      text-align: center;
      margin-bottom: 30px;
      font-weight: 700;
    }

    a.button-create {
      display: inline-block;
      padding: 12px 24px;
      background-color: #1e88e5;
      color: white;
      font-weight: 700;
      font-size: 1.1rem;
      text-decoration: none;
      border-radius: 8px;
      margin-bottom: 25px;
      box-shadow: 0 5px 15px rgba(30,136,229,0.4);
    }

    a.button-create:hover {
      background-color: #1565c0;
      box-shadow: 0 8px 22px rgba(21,101,192,0.6);
    }

    form {
      margin-bottom: 30px;
      display: flex;
      justify-content: center;
      gap: 15px;
      flex-wrap: wrap;
    }

    form input[type="text"] {
      width: 320px;
      padding: 14px 18px;
      border-radius: 8px;
      border: 1.8px solid #cbd5e1;
      font-size: 1rem;
    }
    form input[type="text"]:focus {
      border-color: #1e88e5;
      outline: none;
      box-shadow: 0 0 8px rgba(30,136,229,0.35);
    }

    form button {
      padding: 14px 28px;
      border-radius: 8px;
      background-color: #1e88e5;
      color: white;
      border: none;
      font-weight: 700;
      font-size: 1rem;
      cursor: pointer;
      box-shadow: 0 5px 15px rgba(30,136,229,0.4);
    }
    form button:hover {
      background-color: #1565c0;
      box-shadow: 0 8px 22px rgba(21,101,192,0.6);
    }

    p.success-message {
      max-width: 400px;
      margin: 0 auto 25px;
      padding: 14px 20px;
      border-radius: 10px;
      background-color: #d1e7dd;
      border: 1.5px solid #0f5132;
      color: #0f5132;
      font-weight: 600;
      text-align: center;
      box-shadow: 0 5px 12px rgba(15,81,50,0.3);
    }

    .table-container {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 10px;
      font-size: 1rem;
      color: #444;
      min-width: 600px;
    }

    thead tr {
      background-color: #1e88e5;
      color: white;
      font-weight: 700;
    }

    th, td {
      padding: 16px 20px;
    }

    tbody tr {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 12px rgba(0,0,0,0.05);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    tbody tr:hover {
      box-shadow: 0 10px 25px rgba(30,136,229,0.15);
      transform: translateY(-3px);
    }

    tbody tr td:first-child {
      border-top-left-radius: 12px;
      border-bottom-left-radius: 12px;
    }
    tbody tr td:last-child {
      border-top-right-radius: 12px;
      border-bottom-right-radius: 12px;
    }

    tbody tr td[colspan] {
      text-align: center;
      font-style: italic;
      color: #999;
      font-weight: 500;
    }

    @media (max-width: 480px) {
      h2 {
        font-size: 1.8rem;
      }

      .container {
        padding: 20px;
      }

      a.button-create {
        width: 100%;
        text-align: center;
      }

      form {
        flex-direction: column;
        align-items: stretch;
      }

      form input[type="text"], form button {
        width: 100%;
      }
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
  <h2>Daftar Tiket</h2>
  <a href="{{ route('tickets.create') }}" class="button-create">+ Buat Tiket</a>

  <form method="GET" action="{{ route('tickets.index') }}">
    <input type="text" name="search" placeholder="Cari judul atau nama" value="{{ request('search') }}">
    <button type="submit">Cari</button>
  </form>

  @if(session('success'))
    <p class="success-message">{{ session('success') }}</p>
  @endif

  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Judul</th>
          <th>Jenis Tiket</th>
          <th>Proyek</th>
          <th>Tanggal</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @forelse($tickets as $ticket)
          <tr>
            <td>{{ $ticket->name }}</td>
            <td>{{ $ticket->email }}</td>
            <td>{{ $ticket->title }}</td>
            <td>{{ $ticket->ticketType->name ?? '-' }}</td>
            <td>{{ $ticket->project->name ?? '-' }}</td>
            <td>{{ $ticket->assign_at }}</td>
            <td>{{ ucfirst($ticket->status) }}</td>
          </tr>
        @empty
          <tr><td colspan="7">Tidak ada tiket</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
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
