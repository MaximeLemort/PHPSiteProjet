<html lang="fr">
    <?php
    require '../config/Autoload.php';
    Autoload::charger();
    ?>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../vue/stylesheet/bootstrap.css"/>
        <title>Ceci est un début de blog</title>
    </head>
    <body class="pagebackground">

        <?php
        require 'banner.html';
        ?>

        <div>
            <?php
            try {
                require '../modele/listeArticles.php';
                require 'affichageArticles.php';
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