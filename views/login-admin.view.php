<div class="p-5" style="background-image:url('./img/emploi.png'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto mb-3 shadow" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase">Accéder au compte Administreur</div>


<form action="profil_admin" class="container mt-5" style="width:600px;" method="POST">
    <div class="mb-3">
        <label for="name-admin" class="form-label fw-bold">Votre login admin</label>
        <input type="text" class="form-control" id="name-admin" name="name-admin" style="background:#dcdcdc" required>
    </div>

    <div class="mb-3">
        <label for="password-admin" class="form-label fw-bold">Votre mot de passe admin</label>
        <input type="password" class="form-control" id="password-admin" name="password-admin" style="background:#dcdcdc" required>
    </div>

    <button type="submit" class="btn btn-secondary d-block mx-auto mb-4">Se connecter</button>
</form>