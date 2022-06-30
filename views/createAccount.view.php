<div class="p-5" style="background-image:url('./img/profil_header.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto mb-4 shadow" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2">CREATION<br/>DE VOTRE COMPTE</div>


<form action="validation_account" class="container mt-5" style="width:600px;" method="POST">
    <div class="mb-3">
        <label for="login" class="form-label fw-bold">Votre nom</label>
        <input type="text" class="form-control" id="login" name="login" style="background:#dcdcdc" required>
    </div>

    <div class="mb-3">
        <label for="mail" class="form-label fw-bold">Votre adresse mail</label>
        <input type="mail" class="form-control" id="mail" name="mail" style="background:#dcdcdc" required>
    </div>

    <div class="mb-3">
        <label for="mot_de_passe" class="form-label fw-bold">Votre mot de passe</label>
        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" style="background:#dcdcdc" required>
    </div>

    <div class="mb-3">
        <label for="role" class="form-label fw-bold">Vous êtes</label>
        <select class="form-select" name="role" id="role" style="background:#dcdcdc">
            <option selected>...</option>
            <option value="1">Candidats</option>
            <option value="2">Recruteurs</option>
        </select>
    </div>

    <button type="submit" class="btn btn-secondary d-block mx-auto my-4 mt-5">S'inscrire</button>
</form>
</div>