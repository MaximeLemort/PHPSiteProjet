<?php
    require 'sanitize.php';
    require 'validation.php';
    if (isset($_POST['Submit'])) {
        session_start();
        $chaine=sanitize::sanitizeChaine($_POST['login'], 'login');
        if (validation::validateChaine($chaine, 'login'))
            $_SESSION['login']=$chaine;
        else{
            echo '<br><center>ERREUR LOGIN</center></br>';
            exit;
        }

        $chaine=sanitize::sanitizeChaine($_POST['password'], 'password');
        if (validation::validateChaine($chaine, 'password'))
            $_SESSION['password']=$chaine;
        else{
            echo '<br><center>ERREUR PASSWORD</center></br>';
            exit;
        }
        echo $_SESSION['login'].' '.$_SESSION['password'];
    }