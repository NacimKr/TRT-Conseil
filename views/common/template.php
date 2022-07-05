<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRT Conseil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    

    <?php 
        if(isset($_SESSION['admin'])){
            require_once "./views/admin/menu-admin.php"; 
        }else{
            require_once "menu.php"; 
        }
    ?>
        
    <?= $page_content ?>

    <?php if(isset($_SESSION['alert'])) : ?>
        <div class="alert <?= $_SESSION['alert']['class'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['alert']['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php 
        unset($_SESSION['alert']);
        endif; 
    ?>


    <!--Fonction optionnel a retirer -->

    <form action="" method="POST" >
        <input type="hidden" name="vider">
        <button class="btn btn-warning mx-auto d-block mb-5" type="submit">Vider la session</button>
    </form>

    <?php
    
    if(isset($_POST['vider'])){
        unset($_SESSION['connecté']);
        unset($_SESSION['postuler']);
        unset($_SESSION['admin']);
        header('Location:http://localhost/TRT_CONSEIL/home');
    }


    echo "<pre>";
    var_dump($_SERVER);
    echo "</pre>";

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>