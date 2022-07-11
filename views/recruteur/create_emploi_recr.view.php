<form class="container mt-5" style="width:700px;" method="POST">
    <div class="mb-3">
        <label for="poste" class="form-label">Intitulé du Poste</label>
        <input type="text" class="form-control" name="poste" id="poste" style="background:#dcdcdc" required>
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label">Durée</label>
        <input type="text" class="form-control" name="duration" id="duration" aria-describedby="emailHelp" style="background:#dcdcdc" required>
    </div>

    <div class="mb-3">
        <label for="debut" class="form-label">Horaires Début</label>
        <input type="time" class="form-control mb-2" name="debut" id="debut" aria-describedby="emailHelp" style="background:#dcdcdc" required>
        <label for="fin" class="form-label ">Horaires Fin</label>
        <input type="time" class="form-control" name="fin" id="fin" aria-describedby="emailHelp" style="background:#dcdcdc" required>
    </div>

    <div class="mb-3">
        <label for="salary" class="form-label">Salaire</label>
        <input type="text" class="form-control" name="salary" id="salary" aria-describedby="emailHelp" style="background:#dcdcdc" placeholder="€" required>
    </div>

    <label for="floatingTextarea">Description du poste</label>
    <textarea class="form-control mb-3" name="description" style="height: 300px; resize:none; background:#dcdcdc"></textarea>

    <button type="submit" class="btn btn-secondary d-block mx-auto mb-5">Publier mon offre</button>
</form>