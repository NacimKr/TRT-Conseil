<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">La liste des offres d'emploi</div>
</div>

<?php if(count($emplois_recr) <= 0) : ?>
    <p class="text-center fs-3 fw-bold text-danger mt-5">Il n'y'a pas d'offres pour le moment</p>
<?php else : ?>
<?php foreach($emplois_recr as $emploi) : ?>
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
                <div>Durée : <?= $emploi['Duree'] ?></div>
                <div>Horaires : <?= $emploi['heureDebut'] ?> à <?= $emploi['heureFin'] ?></div>
            </div>
        </div>
<?php endforeach; ?>
<?php endif; ?>

<a href="create_emploi_recr" class="text-decoration-none">
    <button type="submit" class="btn btn-danger d-block mx-auto m-5">Publier une nouvelle offre</button>
</a>

