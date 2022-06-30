<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Les Candidats Inscrits</div>
</div>

<?php foreach($candidats_datas as $candidat) : ?>
    <div class="card mb-3 d-inline-block mx-4 mt-5 p-4" style="width:450px">
        <p><?= $candidat['login'] ?></p>    
        <p><?= $candidat['email'] == "" ? "<b>pas renseigné</b>" : $candidat['email'] ?></p>
    </div>
<?php endforeach; ?>