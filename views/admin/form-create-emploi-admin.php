<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Publier <br/>votre offre</div>
</div>

<form class="container mt-5" style="width:700px;" method="POST">
    <div class="mb-3">
        <label for="poste" class="form-label">Intitulé du Poste</label>
        <input type="text" class="form-control" name="poste" id="poste" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">Durée</label>
        <input type="text" class="form-control" name="duration" id="duration" aria-describedby="emailHelp" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="debut" class="form-label">Horaires Début</label>
        <input type="time" class="form-control mb-2" name="debut" id="debut" aria-describedby="emailHelp" style="background:#dcdcdc">
        <label for="fin" class="form-label ">Horaires Fin</label>
        <input type="time" class="form-control" name="fin" id="fin" aria-describedby="emailHelp" style="background:#dcdcdc">
    </div>

    <div class="mb-3">
        <label for="salary" class="form-label">Salaire</label>
        <input type="text" class="form-control" name="salary" id="salary" aria-describedby="emailHelp" style="background:#dcdcdc" placeholder="€">
    </div>

    <label for="floatingTextarea">Description du poste</label>
    <textarea class="form-control mb-3" name="description" style="height: 300px; resize:none; background:#dcdcdc"></textarea>

    <button type="submit" class="btn btn-secondary d-block mx-auto mb-5">Publier mon offre</button>
</form>