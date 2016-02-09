<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="vue/stylesheet/bootstrap.css"/>
        <title>Blog</title>
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

                    <?php if($_SESSION['role']=='admin')
                    {
                    ?>
                    <tr>
                        <td>
                            <div class="formconnection">
                                <form method="post" >
                                    <input type="submit" value="administration">
                                    <input type="hidden" name="action" value="admin">
                                </form>
                            </div>
                        </td>

                    <?php } else{?>
                    <tr>
                        <td>
                            <div class="formconnection">
                                <strong>Veuillez vous connecter</strong>
                                <form method="post">
                                    <input type="text" name="login" id="login"/>
                                    <input type="password" name="password" id="password"/>
                                    <input type="hidden" name="action" value="connecter"/> <!-- action, refere au FrontController -->
                                    <input type="submit" name="submit" value="Login" />
                                </form>
                            </div>
                        </td>



                    <?php }?>
                    <td>
                        <?php if(isset($_COOKIE['nbCo']))
                                    echo $_COOKIE['nbCo'];
                        ?>
                    </td>
                    </tr>
                    </table>
                    </header>

                    <div>
                        <?php
                        try {
                            foreach ($tabArticles as $value) {
                                if(strlen($value->resume)>100)
                                {
                                    echo $value->titre . '<br>' . substr($value->resume,0,100) . '... (appuyez sur le bouton ci-dessous pour les détails)<br>' . $value->dateParution . '<br><br>';
                                }
                                else {
                                    echo $value->titre . '<br>' . $value->resume . '<br>' . $value->dateParution . '<br><br>';
                                }
                                $id=$value->id;
                                ?>
                                <div class="formconnection">
                                    <form method="post" >
                                        <input type="submit" value="Afficher les détails">
                                        <input type="hidden" value="<?php echo $id?>" name="id" >
                                        <input type="hidden" name="action" value="detail">
                                    </form>
                                </div>
                                <br><br>
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