<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="vue/stylesheet/bootstrap.css"/>
        <title>Ceci est un début de blog</title>
    </head>
    <body class="pagebackground">
        <header>
            <table class="page-header text-center">
                <tr>
                    <td>
                        <img src="vue/stylesheet/worlds-2015-banner-875.jpg" />
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
                            //$_SESSION['role']='admin';
                            //$_SESSION['login']='malemort';
                            //$_SESSION['mdp']='Curser63';
                            foreach ($tabArticles as $value) {
                                echo $value->id.' : '.$value->titre.'<br>'.$value->resume.'<br>'.$value->dateParution.'<br><br>';
                                if(isset($_SESSION['role']))
                                {
                                    ?>
                                    <li><a href="<?php $rep.$vues['editer']?>">Editer</a></li>
                                    <form method="post" >
                                        <input type="submit" value="supprimer">
                                        <input type="hidden" value=<?php $value->id?> name="id" >
                                        <input type="hidden" name="action" value="supprimer">
                                    </form>
                                <?php
                                    echo '<br>';
                                }
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