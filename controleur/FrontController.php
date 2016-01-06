<?php

require('../config/Autoload.php');
Autoload::charger();
require('../config/config.php');


class FrontController
{
    function __construct()
    {
        global $rep, $vues;

        $listeActionAdmin = array('connecter', 'ajouter', 'supprimer', 'editer');
        try{
            $ma=new ModeleAdmin();
            $a=$ma->isAdmin();
            $action=sanitize::sanitizeChaine($_REQUEST['action'], 'action');
            if(in_array($action, $listeActionAdmin)){
                if($a==null)
                    require $rep.$vues['connection'];
                else new AdminController();
            } else new UserController();
        } catch (Exception $e){
            require $rep.$vues['erreur'];
        }
    }

}