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
        </table>
    </header>

    <div class="formconnection">
        <form method="post" >
            <input type="submit" value="Retour à l'accueil">
            <input type="hidden" name="action" value="lister">
        </form>
    </div>

    <br><br>

            <?php
            if(isset($article)) {
                foreach($article as $value) {
                    echo $article->id . " " . $article->titre . "<br>" . $article->resume . "<br>" . $article->dateParution . "<br>";

                    if ($_SESSION['role']=='admin') {
                        ?>
                        <div class="formconnection">
                            <form method="post">
                                <input type="submit" value="editer">
                                <input type="hidden" value="<?php $article->id ?>" name="id">
                                <input type="hidden" value="<?php $article->titre ?>" name="titre">
                                <input type="hidden" value="<?php $article->resume ?>" name="resume">
                                <input type="hidden" name="action" value="pageedit">
                            </form>
                        </div>
                        <div class="formconnection">
                            <form method="post">
                                <input type="submit" value="supprimer">
                                <input type="hidden" value="<?php $value->id ?>" name="id">
                                <input type="hidden" name="action" value="supprimer">
                            </form>
                        </div>
                        <?php
                        echo '<br>';
                    }
                }
            }
            ?>
    </body>
</html>





