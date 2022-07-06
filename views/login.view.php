<div class="p-5" style="background-image:url('./img/emploi.png'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto mb-2 shadow" style="width: 650px; margin-top:-50px;">
    
    <div class="card-body fw-bold text-center fs-2">CONNECTEZ-VOUS<br/> EN TANT QUE CANDIDAT OU RECRUTEUR</div>
    

    <form action="validation_form" class="container mt-3" style="width:600px;" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label fw-bold">Votre nom</label>
        <input type="text" class="form-control" id="name" name="name" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label fw-bold">Votre mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="vous-etes" class="form-label fw-bold mb-3">Vous êtes</label>
        <select class="form-select mb-4" name="vous-etes" id="vous-etes" style="background:#dcdcdc">
            <option selected>...</option>
            <option value="1">Candidats</option>
            <option value="2">Recruteurs</option>
        </select>
    </div>

    <button type="submit" class="btn btn-secondary d-block mx-auto mb-4">Se connecter</button>
</form>

<div class="d-flex justify-content-center mb-4">
    <a href="create_account" class="text-decoration-none text-dark fw-bold fs-5">Créez votre compte en cliquant ici</a>
</div>
<div class="d-flex justify-content-center my-4">
    <a href="login-consultant" class="text-decoration-none text-light fw-bold fs-5 btn btn btn-success">Accès au compte consultant</a>
</div>

<div class="d-flex justify-content-center mb-4">
    <a href="admin" class="text-decoration-none text-light fw-bold fs-5 btn btn btn-danger">Accès au compte administrateur</a>
</div>

</div>