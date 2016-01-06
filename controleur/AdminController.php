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
                default:
                    $TMessage = "Erreur";
                    require('../vue/erreur.php');
            }
        }
        catch (PDOException $e)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ('../vue/erreur.php');

        }
        catch (Exception $e2)
        {
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require ('../vue/erreur.php');
        }

        exit(0);

    }

    function Add() {
        $a=new MdlArticle();
        $id=$_POST['id'];
        $titre=$_POST['titre'];
        $resume=$_POST['resume'];
        $dateParution=$_POST['dateParution'];
        if(validation::validateChaine($id, 'id') && validation::validateChaine($titre, 'titre')
            && validation::validateChaine($resume, 'resume') && validation::validateChaine($dateParution, 'dateParution')) {
            $a->addArticle($id, $titre, $resume, $dateParution);
        }
    }

    function Delete() {
        $a=new MdlArticle();
        $id=$_POST['id'];
        if(validation::validateChaine($id, 'id')) {
            $a->deleteArticle($id);
        }
    }

    function Edit() {
        $a=new MdlArticle();
        $id=$_POST['id'];
        $titre=$_POST['titre'];
        $resume=$_POST['resume'];
        if(validation::validateChaine($id, 'id') && validation::validateChaine($titre, 'titre')
            && validation::validateChaine($resume, 'resume')) {
            $a->editArticle($id, $titre, $resume);
        }
    }

    function Connecter() {
        global $rep, $vues;
        $ma=new ModeleAdmin();
        $ma->Connecter();
        require $rep.$vues['accueil'];
    }
}