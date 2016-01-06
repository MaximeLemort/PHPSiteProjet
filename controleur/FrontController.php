<?php


class FrontController
{
    function __construct()
    {
        global $rep, $vues;
        $listeActionAdmin = array('connecter', 'ajouter', 'supprimer', 'editer');
        try{
            $ma=new ModeleAdmin();
            $a=$ma->isAdmin();
            $action = $_POST['action'];
            echo '<- Action du frontcontroller'.var_dump($action);
            $action=sanitize::sanitizeChaine($action, 'action');
            if(in_array($action, $listeActionAdmin)){
                if($a==null && $action!='connecter')
                    require $rep.$vues['connection'];
                else new AdminController();
            } else new UserController();
        } catch (Exception $e){
            $TMessage[]=$e->getMessage();
            require $rep.$vues['erreur'];
        }
    }
}