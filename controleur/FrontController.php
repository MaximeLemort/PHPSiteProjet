<?php


class FrontController
{
    function __construct()
    {
        global $rep, $vues;
        $listeActionAdmin = array('connecter', 'ajouter', 'supprimer', 'editer', 'pageedit', 'admin', 'deconnecter');
        try{
            $ma=new ModeleAdmin();
            $a=$ma->isAdmin();
            $action = $_POST['action'];
            $action=sanitize::sanitizeChaine($action, 'action');
            if(in_array($action, $listeActionAdmin)){
                new AdminController();
            } else new UserController();
        } catch (Exception $e){
            $TMessage[]=$e->getMessage();
            require $rep.$vues['erreur'];
        }
    }
}