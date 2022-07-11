<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-secondary fw-bold" href="home">TRT<br/> Conseil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto ">

      <?php if(!empty($_SESSION['connecté']['name'])) : ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= URL ?>">Votre Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= URL ?>/vos_offres">Offres Emploi</a>
          </li>
      <?php elseif(!empty($_SESSION['consultant']['nameConsultant'])) : ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="candidats_postule">Listes des candidatures total</a>
          </li>
      <?php elseif(!empty($_SESSION['recruteur_connecte'])) : ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="list_candidature">Listes des candidatures</a>
          </li>
      <?php else :?>
          <li class="nav-item">
            <a class="nav-link text-light" href="candidats">Candidats</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="nos_clients">Nos Clients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="contact">Contact</a>
          </li>
      <?php endif; ?>

      </ul>
    </div>

    <?php if(!empty($_SESSION['recruteur_connecte'])) : ?>
      <div class="d-block text-secondary text-center mb-2 fw-bold">
        <div>Bienvenue sur votre espace <?= ucfirst($_SESSION['recruteur_connecte']['recruteur_role']) ?>, <?= ucfirst($_SESSION['recruteur_connecte']['recruteur_name']) ?></div>
        <a href="deconnect"><button class="mx-3 btn btn-danger">Se déconnecter</button></a>
      </div>
    <?php elseif(!empty($_SESSION['connecté']['name'])) : ?>
      <div class="d-block text-secondary text-center mb-2 fw-bold">
        <div>Bienvenue sur votre espace <?= ucfirst($_SESSION['connecté']['role']) ?>, <?= ucfirst($_SESSION['connecté']['name']) ?></div>
        <a href="deconnect"><button class="mx-3 btn btn-danger">Se déconnecter</button></a>
      </div>
    <?php elseif(!empty($_SESSION['consultant']['nameConsultant'])) : ?>
        <div class="d-block text-secondary text-center mb-2 fw-bold">
          <div>Bienvenue sur votre espace consultant, <?= ucfirst($_SESSION['consultant']['nameConsultant']) ?></div>
          <a href="deconnect"><button class="mx-3 btn btn-danger">Se déconnecter</button></a>
        </div>
    <?php else : ?>
      <a href="login"><button class="btn btn-secondary">Se connecter</button></a>
    <?php endif; ?>

  </div>
</nav>