<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../vue/stylesheet/bootstrap.css"/>
        <title>Ceci est un début de blog</title>
    </head>
    <body>
        <header class="page-header text-center">
            <ul class="tableboutons">
                <li><a href="accueil.php" class="activebouton">Accueil</a></li>
                <li><a href="connection.html">Login</a></li>
            </ul>
        </header>
        <div>
            <?php
            try {
                include '../modele/article.php';
                require '../modele/listeArticles.php';
                require '../vue/affichageArticles.php';
            }
            catch (Exception $ex) {
                $TMessage[]=$ex->getMessage();
                require 'erreur.php';
            }
            ?>
        </div>
        <footer class="modal-footer">Ce blog est un projet PHP</footer>
    </body>
</html>