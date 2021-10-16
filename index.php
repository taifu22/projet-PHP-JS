<?php
$error = 1;
$affiche = 1;

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    if ($_FILES['image']['size'] <= 3000000) {
      $informationsImage = pathinfo($_FILES['image']['name']);
      $extensionImage = $informationsImage['extension'];
      $extensionArray = array('png', 'gif', 'jpg', 'jpeg');
      if (in_array($extensionImage, $extensionArray)) {
        $adress = 'upload/'.time().basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $adress);
        $error= 0;
        $affiche = 0;
      }
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>hebergeur d'images</title>
  <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dosis:wght@800&family=Josefin+Sans:wght@100&family=Nova+Round&display=swap">
</head>

<body>
  <header>
    <ul>
      <li>Heberger</li>
      <li>Historique</li>
      <li>Nous Lier</li>
      <li>Contact</li>
    </ul>
  </header>
  <section>
    <h1>Hebergeur d'images Taoufik</h1>
    <div class="h3">
      <h3>Formulaire d'hébergement</h3>
    </div>
    <form method="post" action="index.php" enctype="multipart/form-data">
      <div class="content-images">
        <p>image - 1</p>
        <div class="images">
          <div class="image">
            <p>cliquez le bouton ci-contre pour choisir une image</p>
          </div>
          <div class="input"><input type="file" name="image"></div>
        </div>
        <button class="valider">Valider</button>
      </div>
    </form>
    <div class="view-image">
      <?php   
        if (isset($error) && $error == 0) {
          echo '
          <div class="supprimer">
          <img id="immagine" src="'.$adress.'" />
          <button class="button1">supprimer l\'image</button>
          </div>';
        } else if (isset($error) && $error == 1) {
          echo '<p class="p">votre image sera affiché ici</p>';
        } 
        ?>
        <?php if (isset($affiche) && $affiche == 1) {
        echo '<p class="p">Aucune image selectionnée</p>';
      }   ?>
    </div>
  </section>
  <footer>
    <p style="font-size: 10px; margin-left:20px ">@ Copyright Chahouat Taoufik 2021</p>
    <div class="socialNetwork">
      <ul>
        <li>
        <a href="https://ww.google.fr" target="_blank" rel="noopener noreferrer">
          <i style="color: white;" class="fab fa-linkedin"></i>
        </li>
        <li>
        </a>
        <a href="https://ww.google.fr" target="_blank" rel="noopener noreferrer">
          <i style="color: white;" class="fab fa-github"></i>
       </a>
       </li>
       <li>
        <a href="https://ww.google.fr" target="_blank" rel="noopener noreferrer">
          <i style="color: white;" class="fab fa-twitter"></i>
        </a>
        </li>
        <li>
        <a href="https://ww.google.fr" target="_blank" rel="noopener noreferrer">
          <i style="color: white;" class="fab fa-codepen"></i>
        </a>
        </li>
      </ul>
    </div>
  </footer>
</body>
<script>
  let error = <?php echo json_encode($error); ?>;
  let butto = document.querySelector('.button1');
  let supprimer = document.querySelector('.supprimer')
  function deletes() {
     console.log('deleted');
     supprimer.innerHTML= '<p class="p">Votre image a été supprimée</p>'
     error = 1;
  }
  butto.addEventListener('click', () => deletes())
</script>
</html>