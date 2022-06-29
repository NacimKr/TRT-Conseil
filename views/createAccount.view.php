<div class="p-5" style="background-image:url('./img/profil_header.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<form action="" class="container mt-5" style="width:600px;" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label fw-bold">Votre nom</label>
        <input type="text" class="form-control" id="name" name="name" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label fw-bold">Votre mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="vous-etes" class="form-label fw-bold">Vous êtes</label>
        <select class="form-select" name="vous-etes" id="vous-etes" style="background:#dcdcdc">
            <option selected>...</option>
            <option value="1">Candidats</option>
            <option value="2">Recruteurs</option>
        </select>
    </div>

    <button type="submit" class="btn btn-secondary d-block mx-auto mb-4">S'inscrire'</button>
</form>