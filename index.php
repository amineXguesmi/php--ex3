<?php 
session_start();
if(!isset($_SESSION['notes'])){
    $_SESSION['notes']=array();
}
if(isset($_POST['titre'])){
    $taille = count($_SESSION['notes']);
    $titre = $_POST['titre'];
    $content = $_POST['note'];
    $donnee = $titre.'#'.$content;
    $_SESSION['notes'][$taille] = $donnee;    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>google keep</title>
    <link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="containner">
        <div class="row">
    <div class="col-6">
        <form action="./index.php" method="post">
            <input type="text" name="titre" placeholder="Titre" class="form-control" required><br>
            <textarea name="note" cols="50" rows="20" placeholder="Note" class="form-control" required></textarea><br>
            <button type="submit" class="btn btn-success form-control">Ajouter</button>
        </form>
        <form action="./init.php">
        <button class="btn btn-danger form-control">Se déconnecter</a></button>
        </form>
    </div>
    <div class="col-6">
        <?php 
            foreach($_SESSION['notes'] as $data){
                $position = strpos($data,'#');
                $title = substr($data,0,$position);
                $contenu = substr($data,$position-strlen($data)+1);
        ?>
        <div class="alert alert-secondary ">
            <h2 class="text-center"><?= $title ?></h2>
            <div class="border bg-light align-items-end ">
                <p class="contenu"><?= $contenu ?></p>
            </div>
        </div> 
        <?php
            }
        ?>       
    </div>
    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>