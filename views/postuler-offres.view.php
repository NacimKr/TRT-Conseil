<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Votre candidature<br/> à bien été pris en compte</div>
</div>
<?php
    //echo substr($_GET['page'], 10, 0);
    foreach($get_emploi as $emplois){
        $_SESSION['postuler_name'] = [
            "emplois" => $emplois
        ];
        foreach($emplois as $emploi){
            echo $emploi."<br/>";
        }
    }
?>
<a href="home">
    <button class="d-block mx-auto btn btn-danger">Retour à l'accueil</button>
</a>