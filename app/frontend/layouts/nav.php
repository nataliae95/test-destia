<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Destia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <?php if (isset($_SESSION['name'])): ?>
          <li class="nav-item">
            <span class="navbar-text me-3 fw-bold text-secondary"><?php echo $_SESSION['name']; ?></span>
          </li>
          <li class="nav-item">
            <form action="/logout" method="POST" class="d-inline">
              <button class="btn btn-outline-danger" type="submit">Cerrar Sesión</button>
            </form>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="/login">Iniciar Sesión</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>