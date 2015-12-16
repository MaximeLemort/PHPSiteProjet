<?php
    require 'sanitize.php';
    require 'validation.php';
    if (isset($_POST['Submit'])) {
        session_start();
        $_SESSION['login']="";
        $_SESSION['password']="";
        $chaine=sanitize::sanitizeChaine($_POST['login'], 'login');
        if (validation::validateChaine($chaine, 'login'))
            $_SESSION['login']=$chaine;
        else{
            $TMessage=[];
            $TMessage[1]="Login error";
            require '../vue/erreur.php';
        }

        $chaine=sanitize::sanitizeChaine($_POST['password'], 'password');
        if (validation::validateChaine($chaine, 'password'))
            $_SESSION['password']=$chaine;
        else{
            $TMessage=[];
            $TMessage[1]="Password error";
            require '../vue/erreur.php';
        }
         //require '../vue/accueil.php'; -> TODO : REDIRECTION SUR ACCUEIL
    }