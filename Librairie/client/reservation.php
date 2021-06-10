<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
session_start();
if (isset($_REQUEST['DatePret'],$_REQUEST['Dateretour'], $_REQUEST['Quantite'])){
 // récupérer la date d'emprunt et supprimer les antislashes ajoutés par le formulaire
 $DatePret = stripslashes($_REQUEST['DatePret']);
 $DatePret = mysqli_real_escape_string($conn, $DatePret); 
  // récupérer la date retour et supprimer les antislashes ajoutés par le formulaire
  $Dateretour = stripslashes($_REQUEST['Dateretour']);
  $Dateretour = mysqli_real_escape_string($conn, $Dateretour); 
 // récupérer la quantité et supprimer les antislashes ajoutés par le formulaire
 $Quantite = stripslashes($_REQUEST['Quantite']);
 $Quantite = mysqli_real_escape_string($conn, $Quantite); 
  //requéte SQL 
    $query = 'INSERT into `pret` (DatePret, Dateretour, Quantite, ID, Id_livre)
              VALUES ("'.$DatePret.'","'.$Dateretour.'","'.$Quantite.'","'.$_SESSION['Id_utilisateur'].'",4)';
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3><p>Vous êtes inscrit avec succès.</h3>";
      } else{
        
          echo "<p>Erreur</p>";
        

}
}
?>
</body>
</html>