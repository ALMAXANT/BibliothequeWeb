<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <body style='background: #fff;'>
        <div id="content">
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if($_SESSION['Email'] !== ""){
                    $user = $_SESSION['Email'];
                    // afficher un message
                    echo "Bonjour $Email, vous êtes connecté";
                }
            ?>
            
        </div>
    </body>
</html>