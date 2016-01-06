<html>
<body>
<div class="page-header">
    <table>
        <tr>
            <td>
                <ul class="tableboutons">
                    <li><a href="vue/accueil.php">Accueil</a></li> <!--TODO : remplacement par forumlaire 'retour a l'accueil'-->
                    <li><a href="vue/connection.php">Login</a></li> <!--TODO : remplacement par forumlaire 'connecter'-->

                <?php
                if(isset($_SESSION['role']))
                {
                    ?>
                    <li><a href="<?php $rep.$vues['admin']?>">Administration</a></li>
                <?php } ?>
                </ul>
            </td>
            <td>

                    <?php

                        if(isset($_SESSION['role'])) {
                            echo 'Bienvenue, Mr. '.$_SESSION['login'];
                        }
                        else echo 'Non connecté';

                        if(isset($_COOKIE['nbCo']))
                            echo $_COOKIE['nbCo'];
                        ?>
            </td>
        </tr>
    </table>
</div>
</body>
</html>