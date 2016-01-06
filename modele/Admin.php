<?php


class Admin
{
    var $login;
    var $mdp;

    function __construct($login, $mdp)
    {
        $this->login=$login;
        $this->mdp=mdp;
    }
}