<?php

require ('config.php');
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["Email"])){
    header("Location: login.php");
    exit(); 
  }
?>
<?php
echo $_SESSION['Id_utilisateur'];
?>


<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['Email']; ?>!</h1>
    

    <body>
		<header>
	
					<div class="manageMember">
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Date réservation</th>
                <th>Date retour</th>
                <th>Quantité</th>
                <th>Option</th>
            </tr>
        </thead>
        </div>
        
               
	<?php
   
        $conn = mysqli_connect("localhost", "root" , "", "librairie");
        if ($conn-> connect_error){
            die("Echec connexion:" . $conn-> connect_error);
        }
		$requete = "SELECT * FROM livre , auteur, pret";
		$resultat = $conn -> query($requete);
		while ($ligne = $resultat -> fetch_assoc()) {
            echo "<tr>
              
                  <td>" .$ligne['Titre']."</td>
                  <td>" .$ligne['Nom_Auteur']." " .$ligne['Prenom_Auteur']."</td>
                  <form action = 'reservation.php?ID_pret=".$ligne['ID_pret']."' method = POST>
                  <td> <input type =date name = 'DatePret' value= 2020-06-01>  </td>
                  <td> <input type =date name = 'Dateretour' value= 2020-06-01>  </td>
                  <td> <input type= text class= box-input  name= 'Quantite' placeholder= Quantité required /> </td>
            
                  <td> <input type= submit name= submit  value= Réserver class = button /> </td>
                  
                  </tr>";
		}
		$conn->close();
		?>
         
       
    </table>

    <a href="logout.php">Déconnexion</a>
    </div>
  </body>
  <?php include 'footer.html'; ?>
</html>