<html>

<?php include 'header.html'; ?>

<head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="verification.php" method="POST">
                <h1>Inscription</h1>
   
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrer le nom" name="username" required>
   
                <label><b>Prénom</b></label>
                <input type="text" placeholder="Entrer le prénom" name="username" required>

                <label><b>Téléphone</b></label>
                <input type="text" placeholder="Entrer le numéro de téléphone" name="username" required>

                <label><b>Code Postal</b></label>
                <input type="text" placeholder="Entrer le code postal" name="username" required>

                <label><b>Mail utilisateur</b></label>
                <input type="text" placeholder="Entrer le mail" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <label><b>Vérifiez le mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe précédent" name="password" required>

                <input type="submit" id='submit' value='SUIVANT' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
        </div>
    </body>
</html>












<?php include 'footer.html'; ?>