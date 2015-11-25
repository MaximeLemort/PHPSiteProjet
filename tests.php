<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 11/25/2015
 * Time: 17:20
 */

    include 'controleur/validation.php';
    $chaine1='Jean';
    $chaine2='Coucou';

    $chaine3='J$jan';
    $chaine4='*a;:je';

    if(validation::validChaine($chaine3, 'login')==true)
        echo 'ok';
    else echo 'erreur';
