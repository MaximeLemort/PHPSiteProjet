<?php

/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 12/16/2015
 * Time: 19:08
 */

global $rep, $vues;

class ModeleAdmin //Quoi mettre ici?
{

    var $login;
    var $mdp;

    function __construct()
    {
    }

    function get_data() {
        return $this;
    }

    function Connecter() {

        global $base;
        global $login;
        global $mdp;
        global $logged;

        $log=$_POST['login'];
        $passwd=$_POST['password'];

        $_SESSION['login']="";
        $_SESSION['password']="";

        $logSan=sanitize::sanitizeChaine($log, 'login');
        $passwdSan=sanitize::sanitizeChaine($passwd, 'password');

        if (validation::validateChaine($logSan, 'login'))
            $_SESSION['login'] = $logSan;
        else{
            $TMessage=[];
            $TMessage[1]="Login error";
            require '../vue/erreur.php';
        }

        if (validation::validateChaine($passwdSan, 'password'))
            $_SESSION['password']=$passwdSan;      //utile ?
        else {
            $TMessage = [];
            $TMessage[1] = "Password error";
            require '../vue/erreur.php';
        }

        try{
            $adm=new AdminGateway(new Connection($base, $login, $mdp));
            $adm->connectionAdmin($logSan, $passwdSan);
            $logged=true;
            $_SESSION['role']='admin';
            inc_nb_connections();
        } catch (PDOException $e)
        {
            $TMessage[]=$e->getMessage();
            require '../vue/erreur.php';
        }
        return;
    }

    function isAdmin() {
        if(isset($_SESSION['login']) && isset($_SESSION['mdp'])){
            $login=sanitize::sanitizeChaine($_SESSION['login'], 'login');
            $mdp=sanitize::sanitizeChaine($_SESSION['mdp'], 'mdp');
            return new Admin($login, $mdp);
        }
        else return null;
    }

    function inc_nb_connections(){
        if(isset($_COOKIE['nbCo'])){
            $i=sanitize::sanitizeChaine($_COOKIE['nbCo'], 'nbCo');
            $i++;
            setcookie('nbCo', $i, 365*24*3600);
        }
        else return setcookie('nbCo', 1, 365*24*3600);
    }

}