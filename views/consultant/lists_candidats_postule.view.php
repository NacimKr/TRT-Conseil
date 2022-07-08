<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Liste des postulants</div>
</div>

<?php if(count($list_emploi) <= 0) : ?>
    <p class="text-danger fs-3 fw-bold text-center my-4">Vous n'avez pas de postulant pour le moment</p>
<?php else : ?>
    <table class="border rounded mt-5 table table-hover container table-striped">
        <thead class="table-dark">
                <tr>
                <th scope="col"></th>
                <th scope="col">Email</th>
                <th scope="col">Poste</th>
                <th scope="col">Description du poste</th>
                <th scope="col">Durée</th>
                <th scope="col">Salaire</th>
            </tr>
    </thead>
    <?php foreach($list_emploi as $emplois) : ?>
        <?php if($emplois['emploi_postuler'] === "true") :?>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td><?= $emplois["email"] ?></td>
                    <td><?= $emplois["POSTE"] ?></td>
                    <td><?= $emplois["Description"] ?></td>
                    <td><?= $emplois["Durée"] ?></td>
                    <td><?= $emplois["Salaire"] ?>€</td>
                </tr>  
            </tbody>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>