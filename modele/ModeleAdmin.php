<?php

/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 12/16/2015
 * Time: 19:08
 */
class ModeleAdmin //Quoi mettre ici?
{

    var $login;
    var $mdp;

    function __construct($login, $mdp)
    {
        $this->login = $login;
        $this->mdp = $mdp;
    }

    function get_data() {
        return $this;
    }

}