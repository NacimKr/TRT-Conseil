<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Liste des candidatures</div>
</div>

    <?php if(count($list_candidatures) <= 0)  : ?>
        <?= "<p class='text-center fw-bold fs-3 mt-5 text-danger'>Vous n'avez pas de candidatures</p>" ?>
    <?php else : ?>
    <table class="table table-striped mt-3">
    <thead class="table table-dark">
        <tr>
        <th scope="col"></th>
        <th scope="col">Nom</th>
        <th scope="col">Mail</th>
        <th scope="col">Poste</th>
        <th scope="col">Description</th>
        <th scope="col">Durée</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($list_candidatures as $candidatures) : ?>
            <tr>
                <th scope="row"></th>
                <td><?= $candidatures['login'] ?></td>
                <td><?= $candidatures['email'] ?></td>
                <td><?= $candidatures['POSTE'] ?></td>
                <td><?= $candidatures['Description'] ?></td>
                <td><?= $candidatures['Durée'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    
  </tbody>
</table>
