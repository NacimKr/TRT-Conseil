<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Vous avez postulé <br/>
    à ces offres</div>
</div>

<?php
foreach($emploi_postule as $emplois){
    foreach($emplois as $emploi){
        echo $emploi."<br/>";
    }
    echo "<br/>";
}
?>

