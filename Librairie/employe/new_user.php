<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['Nom'], $_REQUEST['Prenom'], $_REQUEST['CP'], $_REQUEST['Telephone'], $_REQUEST['Email'], $_REQUEST['MDP'])){
 // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
 $Nom = stripslashes($_REQUEST['Nom']);
 $Nom = mysqli_real_escape_string($conn, $Nom); 
  // récupérer le prénom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $Prenom = stripslashes($_REQUEST['Prenom']);
  $Prenom = mysqli_real_escape_string($conn, $Prenom); 
  // récupérer le code postal d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $CP = stripslashes($_REQUEST['CP']);
  $CP = mysqli_real_escape_string($conn, $CP); 
   // récupérer le code postal d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $Telephone = stripslashes($_REQUEST['Telephone']);
  $Telephone = mysqli_real_escape_string($conn, $Telephone); 
  // récupérer l'Email et supprimer les antislashes ajoutés par le formulaire
  $Email = stripslashes($_REQUEST['Email']);
  $Email = mysqli_real_escape_string($conn, $Email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $MDP = stripslashes($_REQUEST['MDP']);
  $MDP = mysqli_real_escape_string($conn, $MDP);
  //requéte SQL 
    $query = "INSERT into `employe` (Nom, Prenom, CP, Telephone, Email, MDP)
              VALUES ('$Nom','$Prenom', '$CP', '$Telephone', '$Email','$MDP')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3><p>Vous êtes inscrit avec succès.</h3>
             <p><a href='users_page.php'>Cliquez ici pour vous revenir à la page d'accueil</a></p>
       </div>";
    }
}else{
{
  echo "<p><a href='users_page.php'>Cliquez ici pour vous revenir à la page d'accueil</a></p>
  </div>";
}
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Ajouter utilisateur</h1>
  <input type="text" class="box-input" name="Nom" placeholder="Nom de l'utilisateur" required />
  <input type="text" class="box-input" name="Prenom" placeholder="Prénom de l'utilisateur" required />
  <input type="text" class="box-input" name="CP" placeholder="Code postal" required />
  <input type="text" class="box-input" name="Telephone" placeholder="Numéro de téléphone" required />
  <input type="text" class="box-input" name="Email" placeholder="Email" required />
    <input type="password" class="box-input" name="MDP" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="Ajouter" class="box-button" />
    <p class="box-register"><a href="users_page.php">Retour</a></p>
</form>
<?php } ?>
</body>
</html>