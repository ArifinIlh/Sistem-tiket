<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Selamat Datang - Sistem Tiket</title>
<style>
  /* Reset */
  * {
    margin: 0; padding: 0; box-sizing: border-box;
  }
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f0f4f8;
    color: #333;
    line-height: 1.6;
  }


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


  .welcome-section {
    max-width: 900px;
    margin: 80px auto 40px;
    background: white;
    padding: 50px 40px;
    border-radius: 16px;
    box-shadow: 0 14px 40px rgba(0,0,0,0.08);
    text-align: center;
  }

  .welcome-section h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    color: #1e88e5;
  }
  .welcome-section p {
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 40px;
  }
  .welcome-section a.cta-button {
    background-color: #1e88e5;
    color: white;
    padding: 14px 36px;
    font-size: 1.15rem;
    border-radius: 8px;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 8px 24px rgba(30,136,229,0.3);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }
  .welcome-section a.cta-button:hover {
    background-color: #1565c0;
    box-shadow: 0 12px 32px rgba(21,101,192,0.5);
  }

  /* Footer */
  footer {
    text-align: center;
    padding: 20px;
    font-size: 0.9rem;
    color: #666;
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
</nav>

<section class="welcome-section">
  <h1>Selamat Datang di Sistem Tiket Kami</h1>
  <p>Kelola dan pantau tiket masalah dengan mudah dan cepat. Sistem kami membantu Anda mengatur, melacak, dan menyelesaikan tiket secara efisien.</p>
  <a href="{{ route('tickets.index') }}" class="cta-button">Lihat Daftar Tiket</a>
</section>
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
<footer>
  &copy; 2025 Sistem Tiket
</footer>
</body>
</html>
