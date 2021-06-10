<?php
require('config.php');

 
if($_GET['Id_Livre']) {
    $Id_Livre = $_GET['Id_Livre'];
 
    $query = "SELECT * FROM livre WHERE Id_Livre = {$Id_Livre}";
    $result = $conn->query($query);
 
    $data = $result->fetch_assoc();
 
    
 


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
         $query = "DELETE livre SET Titre = '$Titre', Type_livre = '$Type_livre' WHERE Id_Livre = {$Id_Livre}"; 
        
         $query = "DELETE auteur SET Nom_Auteur = '$Nom_Auteur', Type_livre = '$Type_livre' WHERE Id_Livre = {$Id_Livre}"; 
           
       
        // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
        echo "<p>Succcessfully Updated</p>";
       
    } else {
        echo "Erorr while updating record : ". $conn->error;
    }
    $conn->close();
    }

}
       
       ?>
       <form class="box" action="" method="post">
           <h1 class="box-title">Nouveau livre</h1>
         <input type="text" class="box-input" name="Titre" placeholder="Titre du livre" required />
         <input type="text" class="box-input" name="Type_livre" placeholder="Type du livre" required />
         <input type="text" class="box-input" name="Nom_Auteur" placeholder="Nom de l'auteur" required />
         <input type="text" class="box-input" name="Prenom_Auteur" placeholder="Prénom de l'auteur" required />
         <input type="hidden" name="Id_Livre" value="<?php echo $data['Id_Livre']?>" />
           <input type="submit" name="submit" value="Ajouter" class="box-button" />
           <p class="box-register"><a href="livre.php">Retour</a></p>
       </form>
       
       </body>
       </html>