<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db-config.php';

function mesheros(PDO $PDO)
{
  $sql = "SELECT * FROM heroAfricain  ORDER BY id DESC";
  $result = $PDO->query($sql);

  $heros = $result->fetchAll(PDO::FETCH_ASSOC);

  $result->closeCursor();

  return $heros;
}
?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Docker!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="
      sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/bootstrap.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="navbar-top-fixed.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  
      <ul class="navbar-nav mr-auto">
         <li class="nav-item">
          <a class="nav-link" href="#">Accueil</a>
        </li>
        <li><a class="nav-link" href="ajout.php">Ajouter un hero</a></li>

      </ul>
  </nav>

  <main role="main" class="container">
    <h2 class="mt-5 mb-5">Liste des heros Africains</h2>

    <?php
    try {
      $PDO = new PDO(DB_DSN, DB_USER, DB_PASS, $options);
      $heros = mesheros($PDO);
      foreach ($heros as $hero) {
        ?>
        <div class="card mt-5">
          <div class="card-header">
            <h2 class="h3"><?= $hero["nom"] ?></h2>
          </div>
          <div class="card-body">
            <p class="card-text"><?= $hero["prenom"]?></p>
            <p class="card-text">est un hero Africain de nationnalite<?= $hero["nationnalite"] ?></p>
          </div>
        </div>
      <?php
      }
    } catch (PDOException $pe) {
      echo 'ERREUR :', $pe->getMessage();
    }
    ?>

  </main>

  <footer class="page-footer font-small bg-dark mt-5">
    <div class="footer-copyright text-center py-3 text-white">© Copyright:
      <a href="#"> ESTM 2022-2023</a>
    </div>
  </footer>

</body>

</html>
