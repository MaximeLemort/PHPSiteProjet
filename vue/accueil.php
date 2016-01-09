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

                    <?php if(isset($_SESSION['role']))
                    {
                    ?>

                    <div class="formconnection">
                        <form method="post" >
                            <input type="submit" value="administration">
                            <input type="hidden" name="action" value="admin">
                        </form>
                    </div>

                    <?php } else{?>



                    <?php }?>
                    <table/>
                    <header/>
                    <div class="formconnection">
                        <strong>Veuillez vous connecter</strong>
                        <form method="post">
                            <input type="text" name="login" id="login"/>
                            <input type="password" name="password" id="password"/>
                            <input type="hidden" name="action" value="connecter"/> <!-- action, refere au FrontController -->
                            <input type="submit" name="submit" value="Login" />
                        </form>
                    </div>
                    <div>
                        <?php
                        try {
                            //$_SESSION['role']='admin';
                            //$_SESSION['login']='malemort';
                            //$_SESSION['mdp']='Curser63';
                            foreach ($tabArticles as $value) {
                                echo $value->id.' : '.$value->titre.'<br>'.substr($value->resume,0, 100).'<br>'.$value->dateParution.'<br><br>';
                                ?>
                                <div class="formconnection">
                                    <form method="post" >
                                        <input type="submit" value="Afficher les détails">
                                        <input type="hidden" value="<?php $value->id?>" name="id" >
                                        <input type="hidden" name="action" value="detail">
                                    </form>
                                </div>
                        <?php
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
        <footer class="modal-footer">Ce blog est un projet PHP</footer>
    </body>
</html>