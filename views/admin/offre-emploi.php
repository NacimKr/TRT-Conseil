<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">La liste des offres d'emploi</div>
</div>

<div class="card mb-3 d-inline-block mx-4 mt-5 p-4" style="width:450px">
    <h3><?= $emploi_datas['Poste'] ?></h3>
    <p class="fs-5"><?= $emploi_datas['Description'] ?></p>
    <p class="fs-5 fw-bold"><?= $emploi_datas['Salaire'] ?>€</p>
</div>

<form action="create-emploi">
    <button class="btn btn-danger d-block mx-auto m-5">Publier une nouvelle offre</button>
</form>