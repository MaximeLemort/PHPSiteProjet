<!DOCTYPE HTML> <!--TODO : avoir des boutons liant sur une page d'ajout, une page de modif et une page de suppression d'article-->
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

            <li><a href="index.php">Retour accueil</a></li>
        <table/>
        <header/>
        
        <?php
            if($_SESSION['role']!='admin') {
                $TMessage[] = "We do not know who you are. Or what you want. But the fact is, you should not be here.";
                require 'erreur.php';
            }
            else{?>
                <h1>Formulaire d'ajout d'article</h1>
                <div class="formconnection">
                    <form method="post" >
                        <input type="text" name="id" value="id">
                        <input type="text" name="titre" value="titre">
                        <br>
                        <textarea name="resume" value="resume"></textarea>
                        <br>
                        <input type="hidden" name="action" value="ajouter">
                        <input type="submit" value="Ajouter">
                    </form>
                </div>

                <div class="formconnection">
                    <form method="post">
                        <input type="submit" value="Deconnexion">
                        <input type="hidden" value="deconnecter">
                    </form>
                </div>
            <?php }?>

        <footer class="modal-footer">Ce blog est un projet PHP</footer>
</body>
</html>