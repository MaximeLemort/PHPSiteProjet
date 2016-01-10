<?php

//require('../config/Autoload.php');
//Autoload::charger();
//require('../config/config.php');
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 12/16/2015
 * Time: 18:55
 */
class AdminController
{

    function __construct() {

        $TMessage=[];
        global $rep, $vues;
        try {
            echo '<br>';
            $action=$_REQUEST['action'];
            var_dump($action);
            echo "<- Action de admincontroller";
            switch($action) {
                case NULL:
                    require('../vue/connection.php');
                    break;
                case "connecter":
                    $this->Connecter();
                    break;
                case "ajouter":
                    $this->Add();
                    break;
                case "supprimer":
                    $this->Delete();
                    break;
                case "editer":
                    $this->Edit();
                    break;
                case "pageedit":
                    require $rep.$vues['editer'];
                    break;
                case "admin":
                    require $rep.$vues['admin'];
                    break;
                case "deconnecter":
                    $this->Deconnecter();
                    break;
                default:
                    $TMessage = "Erreur";
                    require('../vue/erreur.php');
            }
        }
        catch (PDOException $e)
        {
            $TMessage[] =	"Erreur inattendue!!! ";
            require ('../vue/erreur.php');

        }
        catch (Exception $e2)
        {
            $TMessage[] =	"Erreur inattendue!!! ";
            require ('../vue/erreur.php');
        }

        exit(0);

    }

    function Add() {
        global $rep, $vues;
        $a=new MdlArticle();
        $id=$_POST['id'];
        $titre=$_POST['titre'];
        $resume=$_POST['resume'];
        $dateParution=date('Y-m-d');
        //if(validation::validateChaine($id, 'id') && validation::validateChaine($titre, 'titre')
        //    && validation::validateChaine($resume, 'resume') && validation::validateChaine($dateParution, 'dateParution')) {
            $a->addArticle($id, $titre, $resume, $dateParution);
            require ($rep.$vues['conf']);
        //}
        //else {
        //    $TMessage[]="L'ajout a échoué.";
        //    var_dump($id);
        //    var_dump($titre);
        //    var_dump($resume);
        //    var_dump($dateParution);
        //    require $rep . $vues['erreur'];
        //} TODO : résoudre bug validation
    }

    function Delete() {
        global $rep, $vues;
        $a=new MdlArticle();
        $id=$_POST['id'];
        //if(validation::validateChaine($id, '$id')) {
            $a->deleteArticle($id);
            require ($rep.$vues['conf']);
        //}
        //else {
        //    $TMessage[]="La suppression a échouée.";
        //    require $rep . $vues['erreur'];
        //} TODO : Résoudre bug validation
    }

    function Edit() {
        global $rep, $vues;
        $a=new MdlArticle();
        $id=$_POST['id'];
        $titre=$_POST['titre'];
        $resume=$_POST['resume'];
        //if(validation::validateChaine($id, 'id') && validation::validateChaine($titre, 'titre')
        //    && validation::validateChaine($resume, 'resume')) {
            $a->editArticle($id, $titre, $resume);
            require ($rep.$vues['conf']);
        //}
        //else {
        //    $TMessage[]="La modification a échouée.";
        //    require $rep . $vues['erreur'];
        //} TODO : Résoudre bug validation
    }

    function Connecter() {
        global $rep, $vues;
        $ma=new ModeleAdmin();
        $ma->Connecter();
        require $rep.$vues['admin'];
    }

    function Deconnecter() {
        global $rep, $vues;
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_abort();
        session_destroy();
        require $rep.$vues['accueil'];
    }
}