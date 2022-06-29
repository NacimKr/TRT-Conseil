<div class="p-5" style="background-image:url('./img/emploi.png'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Candidats</div>
</div>

<div class="card mb-3 d-inline-block mx-4 mt-5 p-4" style="width:450px">
    <h3><?= $emploi_datas['Poste'] ?></h3>
    <p class="fs-5"><?= $emploi_datas['Description'] ?></p>
    <p class="fs-5 fw-bold"><?= $emploi_datas['Salaire'] ?>€</p>
    <button class="btn btn-primary mb-3 w-50 fs-5">Postuler</button>
</div>