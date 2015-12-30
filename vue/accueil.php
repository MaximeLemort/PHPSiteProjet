<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylesheet/bootstrap.css"/>
        <title>Ceci est un début de blog</title>
    </head>
    <body class="pagebackground">
        <header>
            <table class="page-header text-center">
                <tr>
                    <td>
                        <img src="stylesheet/worlds-2015-banner-875.jpg" />
                    </td>
                </tr>
                <?php
                    if(isset($tabArticles))
                {?>
                <?php
                    require 'banner.php';
                ?>
                <div>
                    <?php
                        try {
                            //require 'affichageArticles.php';
                            foreach ($tabArticles as $value) {
                                echo $value->id.' : '.$value->titre.'<br>'.$value->resume.'<br>'.$value->dateParution.'<br><br>';
                            }
                        }
                        catch (Exception $ex) {
                            $TMessage[]=$ex->getMessage();
                            require 'erreur.php';
                        }
                    ?>
                </div>
                <?php }
                    else echo 'Erreur lors du listage'?>
            <table/>
        <header/>
        <footer class="modal-footer">Ce blog est un projet PHP</footer>
    </body>
</html>