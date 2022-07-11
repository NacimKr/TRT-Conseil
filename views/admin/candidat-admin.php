<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Les Candidats Inscrits</div>
</div>

<?php if(count($candidats_datas)<= 0) : ?>
    <p class="text-center text-danger fs-3 fw-bold">Vous n'avez aucun candidat pour le moment</p>
<?php else :?>
    <table class="border rounded mt-5 table table-hover container table-striped">
    <thead class="table-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Login</th>
    </tr>
  </thead>
    <?php foreach($candidats_datas as $candidat) : ?>
    <tbody>
      <tr>
        <th scope="row"></th>
        <td><?= $consultant["login"] ?></td>
        <td><?= $consultant["email"] == "" ? "<b>pas renseigné</b>" : $candidat['email'] ?></td>
      </tr>  
     </tbody>
    <?php endforeach; ?> 
<?php endif; ?>