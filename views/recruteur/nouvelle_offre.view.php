<?php foreach($emplois as $emploi) : ?>
        <div class="card text-center d-inline-block mt-5 mx-3 shadow" style="width:350px">
            <div class="card-header">
                <p><strong>Intitulé du poste </strong><br/><?= $emploi['POSTE'] ?></p>
            </div>
            <div class="card-body">
                <h5 class="card-title">Description : </h5>
                <p class="card-text"><?= $emploi['Description'] ?></p>
                <a href="#" class="btn btn-primary">
                Salaire : <?= $emploi['Salaire'] ?>€</a>
            </div>
            <div class="card-footer text-muted">
                <div>Durée : <?= $emploi['Durée'] ?></div>
                <div>Horaires : <?= $emploi['heure_debut'] ?> à <?= $emploi['heure_fin'] ?></div>
            </div>
        </div>
<?php endforeach; ?>

<form action="create_emploi">
    <button type="submit" class="btn btn-danger d-block mx-auto m-5">Publier une nouvelle offre</button>
</form>