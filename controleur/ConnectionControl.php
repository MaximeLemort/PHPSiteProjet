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
class ConnectionControl
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
                default:
                    $TMessage = "Erreur";
                    require('../vue/erreur.php');
            }
        }
        catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
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

    function Connecter() {

        $con = new classConnection($base, $login, $mdp);

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
        } catch (PDOException $e)
        {
            $TMessage[]=$e->getMessage();
            require '../vue/erreur.php';
        }

        header('Location: /../vue/accueil.php');
        exit(0);
    }
}