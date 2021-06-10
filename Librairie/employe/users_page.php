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
    <a href="new_user.php"><button type="button">Nouvel utilisateur</button></a>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CP</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Option</th>
            </tr>
        </thead>
        </div>
        <tbody>
               
	<?php
        
        $conn = mysqli_connect("localhost", "root" , "", "librairie");
        if ($conn-> connect_error){
            die("Echec connexion:" . $conn-> connect_error);
        }
		$requete = "SELECT * FROM utilisateur";
		$resultat = $conn -> query($requete);
		while ($ligne = $resultat -> fetch_assoc()) {
            echo "<tr>
                <td>" .$ligne['ID']."</td>
                <td>" .$ligne['Nom']."</td>
                <td>" .$ligne['Prenom']."</td>
                <td>" .$ligne['CP']."</td>
			          <td>" .$ligne['Telephone']."</td>
                <td>" .$ligne['Email']."</td>
                <td>
                <a href='edit.php?ID=".$ligne['ID']."'><button type='button'>Edit</button></a>
                <a href='remove.php?ID=".$ligne['ID']."'><button type='button'>Remove</button></a>
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



