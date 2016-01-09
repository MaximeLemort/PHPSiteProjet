<?php
    global $rep, $vues;
      foreach($TMessage as $value){
          echo($value);
          echo('<br>');
          ?>
          <form method="post" >
              <input type="submit" value="Retour à l'accueil">
              <input type="hidden" name="action" value="lister">
          </form>
    <?php
      }


