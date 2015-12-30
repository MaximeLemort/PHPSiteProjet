<html>
<body>
<div class="page-header">
    <table>
        <tr>
            <td>
                <ul class="tableboutons">
                    <li><a href="<?php $rep.$vues['accueil']?>">Accueil</a></li>
                    <!--<li><a href="<?php //$rep.$vues['connection']?>">Login</a></li>-->
                </ul>
                <?php $adm=new AdminController(); ?>
                <?php
                if($logged == true)
                {
                    ?>
                    <form method="post" >
                        <input type="submit" value="Ajouter">
                        <input type="hidden" name="action" value="ajouter">
                    </form>
                    <form method="post" >
                        <input type="submit" value="Supprimer">
                        <input type="hidden" name="action" value="supprimer">
                    </form>
                    <form method="post" >
                        <input type="submit" value="Editer">
                        <input type="hidden" name="action" value="editer">
                    </form>
                <? } ?>
            </td>
            <td>

                    <?php

                        if(isset($_SESSION['login'])) {
                            echo 'Bienvenue, Mr. '.$_SESSION['login'];
                        }
                        else echo 'Non connecté';
                        ?>
            </td>
        </tr>
    </table>
</div>
</body>
</html>