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

    $chaine3='Jjanù_è';
    $chaine4='*a;:je*$kkguyyy(jj(-ytyiçàô$uhkj';

    $array=array($chaine1, $chaine2, $chaine3, $chaine4);
    validation::validate($array);
    foreach($array as $key =>$value)
    {
       if($value==true)
           echo 'ok';
       else echo 'erreur';
    }

