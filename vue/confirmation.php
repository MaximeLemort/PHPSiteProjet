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
        <tr>
            <h1>Modification effectuée.</h1>
        </tr>
        <tr>
            <td>
                <ul class="tableboutons">
                    <form method="post" >
                        <input type="submit" value="Retour à l'accueil">
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

    <?php }?>
</header>
<footer class="modal-footer">Ce blog est un projet PHP</footer>
</body>
</html>
