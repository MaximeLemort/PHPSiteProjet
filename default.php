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
                <tr>
                    <td>
                        <ul class="tableboutons">
                            <form method="post" >
                                <input type="submit" value="Accueil">
                                <input type="hidden" name="action" value="lister">
                            </form>
                        </ul>
                    </td>
                </tr>
            </table>
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

                <div class="formconnection">
                    <strong>Veuillez vous connecter</strong>
                    <form method="post">
                        <input type="text" name="login" id="login"/>
                        <input type="password" name="password" id="password"/>
                        <input type="hidden" name="action" value="connecter"/> <!-- action, refere au FrontController -->
                        <input type="submit" name="submit" value="Login" />
                    </form>
                </div>

            <?php }?>
        </header>
        <footer class="modal-footer">Ce blog est un projet PHP</footer>
    </body>
</html>
