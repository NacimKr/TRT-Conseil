<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-secondary fw-bold" href=
    <?php if(isset($_SESSION['admin']['login']) && isset($_SESSION['admin']['password'])) : ?>
    <?="validation_form" ?>
    <?php endif; ?>
    >TRT<br/> Conseil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto ">
        <li class="nav-item">
          <a class="nav-link text-light" href="offres_emploi">Offres d'emploi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="candidat">Candidats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="consultant">Vos consultants</a>
        </li>
      </ul>
    </div>

    <?php if(isset($_SESSION['admin']['login']) && isset($_SESSION['admin']['password'])) : ?>
      <a href="create_consultant"><button class="btn btn-secondary">Créer un Consultant</button></a>
      <a href="deconnect"><button class="mx-3 btn btn-danger">Se déconnecter</button></a>
    <?php else : ?>
      <a class="text-success text-decoration-none text-capitalize" href="compte">Votre profil</a>
      <a href="deconnect"><button class="mx-3 btn btn-danger">Se déconnecter</button></a>
    <?php endif; ?>
  </div>
</nav>

