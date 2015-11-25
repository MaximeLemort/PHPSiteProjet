<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="vue/stylesheet/bootstrap.css"/>
        <title>Ceci est un début de blog</title>
    </head>
    <body>
        <header class="page-header text-center">Test header</header>
        <div>
        <?php
        try {
            include 'controleur/article.php';
            require 'modele/listeArticles.php';
            require 'vue/affichageArticles.php';
        }
         catch (Exception $ex) {
            $TMessage[]=$ex->getMessage();
            require 'vue/erreur.php';
        }
        ?>
        </div>
        <footer class="modal-footer">Ce blog est un projet PHP</footer>
    </body>
</html>