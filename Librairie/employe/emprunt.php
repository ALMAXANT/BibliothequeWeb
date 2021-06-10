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
			<section class=nav-bar>
				
					<nav class="nav ">
					
							<li><a href="users_page.php">Utilisateur</a></li>
							<li><a href="livre.php">Livre</a></li>
							<li><a href="emprunt.php">Emprunt</a></li>
					</nav>
					<div class="manageMember">
    
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Id_livre</th>
                <th>Id_emprunt</th>
                <th>Id_utilisateur</th>
                <th>DatePret</th>
                <th>DateRetour</th>
               
                
            </tr>
        </thead>
        </div>
        <tbody>


        <?php
        //require('config.php');
        $conn = mysqli_connect("localhost", "root" , "", "librairie");
        if ($conn-> connect_error){
            die("Echec connexion:" . $conn-> connect_error);
        }
		$requete = "SELECT * FROM pret ";
		$resultat = $conn -> query($requete);
		while ($ligne = $resultat -> fetch_assoc()) {
            echo "<tr>
                <td>" .$ligne['Id_Livre']."</td>
                <td>" .$ligne['ID_pret']."</td>
                <td>" .$ligne['ID']."</td>
                <td>" .$ligne['DatePret']."</td>
                <td>" .$ligne['Dateretour']." </td>
                
            </tr>";
		}
		$conn->close();
		?>
         
        </tbody>
    </table>

   
    </div>
  </body>
  <?php include 'footer.html'; ?>
</html> 