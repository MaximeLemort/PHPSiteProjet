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
                        <input type="submit" value="editer">
                        <input type="text" id="id" value="id">
                        <input type="text" id="titre" value="titre">
                        <input type="text" id="resume" value="resume">
                        <input type="hidden" name="action" value="editer">
                    </form>

                    <li><a href="vue/connection.php">Login</a></li>
                </ul>
            </td>
        </tr>
    </table>
</header>
<footer class="modal-footer">Ce blog est un projet PHP</footer>
</body>
</html>
