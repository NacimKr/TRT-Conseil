<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-secondary fw-bold" href="home">TRT<br/> Conseil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto ">
      <?php if(empty($_SESSION['connecté']['name'])) : ?>
        <li class="nav-item">
          <a class="nav-link text-light" href="candidats">Candidats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="nos_clients">Nos Clients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="contact">Contact</a>
        </li>
        <?php else :?>
          <li class="nav-item">
          <a class="nav-link text-light" href="compte">Votre Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="vos_offres">Vos offres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="contact">Contact</a>
        </li>
          <?php endif; ?>
      </ul>
    </div>

    <?php if(empty($_SESSION['connecté']['name'])) : ?>
      <a href="login"><button class="btn btn-secondary">Se connecter</button></a>
    <?php else : ?>
      <div>
      <div class="d-block text-secondary text-center mb-2 fw-bold">Bienvenue, <?= ucfirst($_SESSION['connecté']['name']) ?></div>
      <a href="deconnect"><button class="mx-3 btn btn-danger">Se déconnecter</button></a>
      </div>
      <?php endif; ?>
  </div>
</nav>

