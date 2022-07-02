<div class="p-5" style="background-image:url('./img/profil_header.jpg'); height:280px">
    <div class="fs-2 bg-light fw-bold rounded-circle text-center w-25 mx-auto p-4 mt-5">TRT Conseil</div>
</div>

<div class="card mx-auto mb-5" style="width: 450px; margin-top:-50px;">
    <div class="card-body fw-bold text-center fs-2 shadow">Votre profil <br/> public</div>
</div>

<form class="container">
  <div class="mb-3">
    <label for="login" class="form-label">Votre login</label>
    <input type="text" class="form-control text-capitalize" id="login" name="login" placeholder="<?= $_SESSION['connecté']['name'] ?>" disabled>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Votre mot de passe</label>
    <input type="password" class="form-control" id="password" placeholder="<?= $_SESSION['connecté']['password'] ?>" disabled>
  </div>

  <label for="floatingTextarea">Description</label>
  <textarea class="form-control mb-3" style="height: 300px; resize:none;" disabled></textarea>
  
  <div>
    <a href="<?= $_POST['cv'] ?>" class="text-decoration-none text-light btn btn-primary my-4">Votre CV</a>
  </div>

  <button type="submit" class="btn btn-primary" disabled>Submit</button>
</form>

<pre>
  
  <?= $initial = substr($_SERVER['SCRIPT_NAME'], 0, -9) ?>
  <?= $second = str_replace($initial, "", $initial."file_cv") ?>
  <!--<?= $initial ?>-->
</pre>