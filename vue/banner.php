<html>
<body>
<div class="page-header">
    <table>
        <tr>
            <td>
                <ul class="tableboutons">
                    <li><a href="<?php $rep.$vues['accueil']?>">Accueil</a></li>
                    <li><a href="<?php $rep.$vues['connection']?>">Login</a></li>
                </ul>
                <?php
                if(isset($_SESSION['admin']))
                {
                    ?>
                    <li><a href="<?php $rep.$vues['admin']?>">Administration</a></li>
                <?php } ?>
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