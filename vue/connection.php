<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylesheet/bootstrap.css"/>
        <title>Ceci est un début de blog</title>
    </head>
    <body class="pagebackground">
        <header class="text-center">
            <img src="stylesheet/worlds-2015-banner-875.jpg"/>
        </header>
        <?php
        require 'banner.php';
        ?>
        <div class="formconnection">
            <strong>Veuillez vous connecter</strong>
            <form action="../controleur/AdminController.php" method="post">
            <input type="text" name="login"/>
            <input type="password" name="password"/>
            <input type="hidden" name="action" value="connecter"/> <!-- action, refere a AdminController -->
            <input type="submit" name="Submit" value="Login" />
            </form>
        </div>
        <footer class="modal-footer">Ce blog est un projet PHP</footer>
    </body>
</html>