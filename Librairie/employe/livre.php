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
    <a href="new_livre.php"><button type="button">Nouveau livre</button></a>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Type Livre</th>
                <th>ID Auteur</th>
                <th>Auteur</th>
                <th>Option</th>
                
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
		$requete = "SELECT * FROM livre, auteur WHERE livre.Id_Auteur = auteur.Id_Auteur";
		$resultat = $conn -> query($requete);
		while ($ligne = $resultat -> fetch_assoc()) {
            echo "<tr>
                <td>" .$ligne['Id_Livre']."</td>
                <td>" .$ligne['Titre']."</td>
                <td>" .$ligne['Type_livre']."</td>
                <td>" .$ligne['Id_Auteur']."</td>
                <td>" .$ligne['Nom_Auteur']." ".$ligne['Prenom_Auteur']."</td>
                <td>
                <a href='edit_livre.php?Id_livre=".$ligne['Id_Livre']."'><button type='button'>Edit</button></a>
                <a href='remove_livre.php?Id_livre=".$ligne['Id_Livre']."'><button type='button'>Remove</button></a>
                </td>
            </tr>";
		}
		$conn->close();
		?>
         
        </tbody>
    </table>

    <a href="logout.php">Déconnexion</a>
    </div>
  </body>
  <?php include 'footer.html'; ?>
</html>     