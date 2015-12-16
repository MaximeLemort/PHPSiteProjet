<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../vue/stylesheet/bootstrap.css"/>
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
            <tr>
                <td>
                    <ul class="tableboutons">
                        <li><a href="accueil.php">Accueil</a></li>
                        <li><a href="connection.html">Login</a></li>
                    </ul>
                </td>
                <td>
                    <?php
                        if(isset($_SESSION['login']) && isset($_SESSION['password'])) {
                            echo $_SESSION['login'].' '.$_SESSION['password'];
                        }
                            else echo 'Non connecté';
                    ?>
                </td>
            </tr>
        </table>
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