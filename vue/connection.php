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
            <form method="post">
            <input type="text" name="login" id="login"/>
            <input type="password" name="mdp" id="mdp"/>
            <input type="hidden" name="action" value="connecter"/> <!-- action, refere au FrontController -->
            <input type="submit" name="submit" value="Login" />
            </form>
        </div>
        <footer class="modal-footer">Ce blog est un projet PHP</footer>
    </body>
</html>