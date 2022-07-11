<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Offres d'emploi</div>
</div>

<?php if(count($emploi_datas) <= 0) : ?>
    <p class="text-danger fs-3 fw-bold text-center mt-5">Il n'y a pas d'offres pour le moment</p>
<?php else : ?>

<?php foreach($emploi_datas as $emploi) : ?>
    <div class="card text-center d-inline-block my-5 mx-3 shadow" style="width:350px">
        <div class="card-header">
            <p><strong>Intitulé du poste </strong><br/><?= $emploi['POSTE'] ?></p>
        </div>
        <div class="card-body">
            <h5 class="card-title">Description : </h5>
            <p class="card-text"><?= $emploi['Description'] ?></p>
            <p>Salaire : <?= $emploi['Salaire'] ?>€</p>

                <a href="postuler/<?= $emploi['POSTE'] ?>" class="text-decoration-none text-light">
                    <button type="submit" class="btn btn-primary mx-auto"
                        <?php foreach($emploi_datas as $emploi){
                            if($emploi['emploi_postuler'] === "true"){
                                echo "disabled";
                            }else{
                                echo "coucou";
                            }
                        }?>
                    >Postuler</button>
                </a>

        </div>
        <div class="card-footer text-muted">
            <p>Durée : <?= $emploi['Durée'] ?></p>
        </div>
    </div>
<?php endforeach; ?>
<?php endif; ?>



