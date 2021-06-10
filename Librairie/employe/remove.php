<?php
require('config.php');

 
if($_GET['ID']) {
    $ID = $_GET['ID'];
 
    $query = "SELECT * FROM utilisateur WHERE ID = {$ID}";
    $result = $conn->query($query);
 
    $data = $result->fetch_assoc();

    ?>

    <?php
 if (isset($_REQUEST['ID'],$_REQUEST['Nom'], $_REQUEST['Prenom'], $_REQUEST['CP'], $_REQUEST['Telephone'], $_REQUEST['Email'], $_REQUEST['MDP'])){
    // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $ID = stripslashes($_REQUEST['ID']);
    $ID = mysqli_real_escape_string($conn, $ID); 
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
       $query = "DELETE utilisateur SET ID = '$ID', Nom = '$Nom', Prenom = '$Prenom', CP = '$CP', Telephone = '$Telephone', Email = '$Email' ,'MDP' = '$MDP'  WHERE ID = {$ID}";
    // Exécuter la requête sur la base de données
      $res = mysqli_query($conn, $query);
      if($res){
          echo "<p>Succcessfully Deleted</p>";
         
      } else {
          echo "Erorr while delete user : ". $conn->error;
      }
      $conn->close();
      }
    }
      ?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
 
<h3>Voulez vous vraiment supprimer ?</h3>
<form class="box" action="" method="post">
 
    <input type="hidden" name="ID" value="<?php echo $data['ID'] ?>" />
    <button type="submit">Supprimer</button>
    <a href="users_page.php"><button type="button">retour</button></a>
</form>
 
</body>
</html>