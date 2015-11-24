<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Ceci est une page d'erreur.
        </title>
    </head>
    <body>
        
        <?php
            
            foreach($TMessage as $value){
                echo($value);
                echo('<br>');
            }
        ?>
    </body>
</html>


