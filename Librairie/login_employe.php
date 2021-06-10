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
    $query = "SELECT * FROM utilisateur ,employe WHERE utilisateur.ID = employe.Id_employe and Email='$Email' and MDP='$password'";
  $result = mysqli_query($conn,$query) or die('Error: ' . mysqli_error($conn));
  $rows = mysqli_num_rows($result);
  if($rows==1){
      $_SESSION['Email'] = $Email;
      header("Location: employe/users_page.php");
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="Email" placeholder="Mail d'utilisateur">
<input type="password" class="box-input" name="MDP" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">

<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
<?php include 'footer.html'; ?>
</html>