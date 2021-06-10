<?php
session_start();
if(isset($_POST['Email']) && isset($_POST['MDP']))
{
    // connexion à la base de données
    $server     = "localhost";
    $username = "root";
    $password = "";
    $db     = "librairie";
   
    $conn = mysqli_connect($server, $username, $password);
    if (!$conn)  echo " connexion a echoué\n"; exit;}
    else echo "connexion réussi";
  // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $Email = mysqli_real_escape_string($conn,htmlspecialchars($_POST['Email'])); 
    $MDP = mysqli_real_escape_string($conn,htmlspecialchars($_POST['MDP']));
   
   if($Email !== "" && $MDP !== "")
   {
       $requete = "SELECT count(*) FROM utilisateur where 
             Email = '".$Email."' and MDP = '".$MDP."' ";
       $exec_requete = mysqli_query($db,$requete);
       $reponse      = mysqli_fetch_array($exec_requete);
       $count = $reponse['count(*)'];
       if($count!=0) // nom d'utilisateur et mot de passe correctes
       {
          $_SESSION['Email'] = $Email;
          header("Location: page_connexion.php");
       }
       else
       {
          header("Location: connexion.php?erreur=1"); // utilisateur ou mot de passe incorrect
       }
   }
   else
   {
      header("Location: connexion.php?erreur=2"); // utilisateur ou mot de passe vide
   }


{
  header("Location: connexion.php");
}

?>