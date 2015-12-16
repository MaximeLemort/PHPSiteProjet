<?php
    require '../config/Autoload.php';
    Autoload::charger();

    if (isset($_POST['Submit'])) {
        $_SESSION['login']="";
        $_SESSION['password']="";
        $chaine=sanitize::sanitizeChaine($_POST['login'], 'login');
        if (validation::validateChaine($chaine, 'login'))
            $_SESSION['login'] = $chaine;
        else{
            $TMessage=[];
            $TMessage[1]="Login error";
            require '../vue/erreur.php';
            session_destroy(); //pas bien
        }

        $chaine=sanitize::sanitizeChaine($_POST['password'], 'password');
        if (validation::validateChaine($chaine, 'password'))
            $_SESSION['password']=$chaine;
        else {
            $TMessage = [];
            $TMessage[1] = "Password error";
            require '../vue/erreur.php';
            session_destroy(); //pas bien
        }
        header('Location: ../vue/accueil.php'); //-> TODO : REDIRECTION SUR ACCUEIL avec passage du login/mdp
    }

