<!DOCTYPE html>
<html>
<?php include 'header.html'; ?>
<head>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require ('config.php');
session_start();
if (isset($_POST['Email'])){
  $Email = stripslashes($_REQUEST['Email']);
  $Email = mysqli_real_escape_string($conn, $Email);
  $password = stripslashes($_REQUEST['MDP']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM utilisateur, client WHERE utilisateur.ID = client.Id_client and Email='$Email' and MDP='$password'";
  $result = mysqli_query($conn,$query) or die('Error: ' . mysqli_error($conn));
  $rows = mysqli_num_rows($result);







  $sqlcli = 'SELECT * FROM utilisateur WHERE Email = "'.$Email.'" && MDP = "'.$password.'"';

  $numclient = $conn->query($sqlcli);

  while ($donnees2 = $numclient->fetch_assoc()){

      $_SESSION['Id_utilisateur'] = $donnees2['ID'];        //Numero du client connecté

  } 



  if($rows==1){
      $_SESSION['Email'] = $Email;
      header("Location: client/users_page.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}


    
    
    //SQL NUMCLIENT
    
      



  

              


?>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="Email" placeholder="Mail d'utilisateur">
<input type="password" class="box-input" name="MDP" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
<?php include 'footer.html'; ?>
</html>