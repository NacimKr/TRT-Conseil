<div class="p-5" style="background-image:url('./img/administration.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto" style="width: 650px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 text-uppercase shadow">Liste de vos consultants</div>
</div>

<?php if(count($consultants_datas) > 0) : ?>
<table class="border rounded mt-5 table table-hover container table-striped">
  <thead class="table-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Login</th>
    </tr>
  </thead>
  <?php foreach($consultants_datas as $consultant) : ?>
    <tbody>
      <tr>
        <th scope="row"></th>
        <td><?= $consultant["Nom"] ?></td>
        <td><?= $consultant["Prenom"] ?></td>
        <td><?= $consultant["login"] ?></td>
      </tr>  
  </tbody>
  <?php endforeach; ?>

  <?php else : ?>
    <h3 class="m-5 text-center text-danger">Vous n'avez pas de consultants</h3>
  <?php endif; ?>