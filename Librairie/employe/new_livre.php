<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['Titre'], $_REQUEST['Type_livre'], $_REQUEST['Nom_Auteur'], $_REQUEST['Prenom_Auteur'])){
 // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
 $Titre = stripslashes($_REQUEST['Titre']);
 $Titre = mysqli_real_escape_string($conn, $Titre); 
  // récupérer le prénom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $Type_livre = stripslashes($_REQUEST['Type_livre']);
  $Prenom = mysqli_real_escape_string($conn, $Type_livre); 
  // récupérer le code postal d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $Nom_Auteur = stripslashes($_REQUEST['Nom_Auteur']);
  $Nom_Auteur = mysqli_real_escape_string($conn, $Nom_Auteur); 
   // récupérer le code postal d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $Prenom_Auteur = stripslashes($_REQUEST['Prenom_Auteur']);
  $Prenom_Auteur = mysqli_real_escape_string($conn, $Prenom_Auteur); 
  
  //requéte SQL 
    $query = "INSERT into `livre` (Titre, Type_livre)
              VALUES ('$Titre','$Type_livre')";
    
           

    $query = "INSERT into `auteur` (Nom_Auteur, Prenom_Auteur)
              VALUES ('$Nom_Auteur','$Prenom_Auteur')";

  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3><p>Vous êtes inscrit avec succès.</h3>
             <p><a href='livre.php'>Cliquez ici pour vous revenir à la page d'accueil</a></p>
       </div>";
    }
//}else
//{
//  echo "<p><a href='livre.php.php'>Cliquez ici pour vous revenir à la page d'accueil</a></p>

}





?>
<form class="box" action="" method="post">
    <h1 class="box-title">Nouveau livre</h1>
  <input type="text" class="box-input" name="Titre" placeholder="Titre du livre" required />
  <input type="text" class="box-input" name="Type_livre" placeholder="Type du livre" required />
  <input type="text" class="box-input" name="Nom_Auteur" placeholder="Nom de l'auteur" required />
  <input type="text" class="box-input" name="Prenom_Auteur" placeholder="Prénom de l'auteur" required />
  
    <input type="submit" name="submit" value="Ajouter" class="box-button" />
    <p class="box-register"><a href="livre.php">Retour</a></p>
</form>

</body>
</html>