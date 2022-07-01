<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Rajouter<br/> un consultant</div>
</div>

<form class="container mt-5" style="width:700px;" method="POST">

<div class="mb-3">
        <label for="prenom_consultant" class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom_consultant" id="prenom_consultant" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="nom_consultant" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom_consultant" id="nom_consultant" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="login_consultant" class="form-label">Son Login</label>
        <input type="text" class="form-control" name="login_consultant" id="login_consultant" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="password_consultant" class="form-label">Son Mot de passe</label>
        <input type="text" class="form-control" name="password_consultant" id="password_consultant" style="background:#dcdcdc">
    </div>

    <button type="submit" class="btn btn-secondary d-block mx-auto m-5">Créer mon consultant</button>
</form>