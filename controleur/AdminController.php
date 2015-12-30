<?php

require('../config/Autoload.php');
Autoload::charger();
require('../config/config.php');
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 12/16/2015
 * Time: 18:55
 */
class AdminController
{

    function __construct() {

        session_start();

        $TMessage=[];

        try {
            $action=$_REQUEST['action'];
            switch($action) {
                case NULL:
                    require('../vue/accueil.php');
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

    function Connecter() {      //à mettre dans le modele

        global $base;
        global $login;
        global $mdp;
        global $logged;

        $con = new Connection($base, $login, $mdp);

        $log=$_POST['login'];
        $passwd=$_POST['password'];

        $_SESSION['login']="";
        $_SESSION['password']="";

        if (validation::validateChaine($log, 'login'))
            $_SESSION['login'] = $log;
        else{
            $TMessage=[];
            $TMessage[1]="Login error";
            require '../vue/erreur.php';
        }

        if (validation::validateChaine($passwd, 'password'))
            $_SESSION['password']=$passwd;
        else {
            $TMessage = [];
            $TMessage[1] = "Password error";
            require '../vue/erreur.php';
        }

        try{
            $adm=new AdminGateway($con);
            $adm->connectionAdmin($log, $passwd);
            $logged=true;
        } catch (PDOException $e)
        {
            $TMessage[]=$e->getMessage();
            require '../vue/erreur.php';
        }
        header('Location: /../vue/accueil.php');
        exit(0);
    }

    function isAdmin() {    //dans modele aussi et pas sur que ce soit comme ça pour isAdmin
        global $logged;

        if($logged==true) {
            return true;
        }
        return false;
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
}