<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../vue/stylesheet/bootstrap.css"/>
        <title>Ceci est un début de blog</title>
    </head>
    <?php
        if(isset($tabArticles))
    {?>
    <body class="pagebackground">

        <?php
        require 'banner.html';
        ?>

        <div>
            <?php
            try {
               require 'affichageArticles.php';
            }
            catch (Exception $ex) {
                $TMessage[]=$ex->getMessage();
                require 'erreur.php';
            }
            ?>
        </div>
        <?php }
        else echo 'Erreur lors du listage'?>

        <footer class="modal-footer">Ce blog est un projet PHP</footer>
    </body>
</html>