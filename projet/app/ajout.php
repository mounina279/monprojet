<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db-config.php';


function envoyer(PDO $PDO){
    if(!isset($_POST["nom"]) || empty($_POST["nom"])) {
        // echo '<p style="color: red; font-weight: bold;">Il manque le nom de l\'herro</p>';
    }
    elseif(!isset($_POST["prenom"]) || empty($_POST["prenom"])) {
        echo '<p style="color: red; font-weight: bold;">Il manque le prenom de l\'hero</p>';
    }
    elseif(!isset($_POST["nationnalite"]) || empty($_POST["nationnalite"])) {
        echo '<p style="color: red; font-weight: bold;">Il manque le contenu de l\'nationnalite</p>';
    }else{
        $request = $PDO->prepare("INSERT INTO heroAfricain (nom, prenom, nationnalite) VALUES (:nom, :prenom, :nationnalite)");
        $request->bindValue(":nom", $_POST["nom"]);
        $request->bindValue(":prenom", $_POST["prenom"]);
        $request->bindValue(":nationnalite", $_POST["nationnalite"]);
        $request->execute();
        header('Location: index.php'); 
    }

    echo '<p><a href="index.php">accueil</a></p>';
   
}

$PDO = new PDO(DB_DSN, DB_USER, DB_PASS, $options);
envoyer($PDO);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Ajout!</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="
      sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/bootstrap.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="navbar-top-fixed.css" rel="stylesheet">
</head>
<body>
   <div class="container bg-secondary">
    
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
     <ul class="navbar-nav mr-auto">
         <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li><a class="nav-link" href="#">Ajouter un hero</a></li>
      </ul>
</nav>
     <h2 class="mt-5 mb-3" align="center">Ajouter un leader</h2>
    <form action="ajout.php" method="post" class="bg-primary">
      <div class="form-group">
        <label for="title">Nom<span style="color: red; font-weight: bold;"></span></label>
        <input type="text" class="form-control" id="title" name="nom" placeholder="nom " required="required">
      </div>

      <div class="form-group">
        <label for="author">prenom <span style="color: red; font-weight: bold;"></span></label>
        <input type="text" class="form-control" id="author" name="prenom" placeholder="prenom" required="required">
      </div>
      <div class="form-group">
        <label for="content">nationnalite  <span style="color: red; font-weight: bold;"></span></label>
        <input class="form-control" id="content" placeholder="nationnalite" name="nationnalite" rows="3" required="required">
      </div>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
   </div>
</body>
</html>