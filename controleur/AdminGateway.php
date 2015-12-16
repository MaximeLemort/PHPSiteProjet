<?php

/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 12/16/2015
 * Time: 19:40
 */
class AdminGateway
{

    private $con;

    public function _construct(classConnection $con) {
        $this->con = $con;
    }

    public function connectionAdmin($login, $password){
        $query="SELECT login, password FROM admin WHERE login=:login AND password=:password";
        $this->con->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR), ':password' => array($password, PDO::PARAM_STR)));
        $res=$this->con->getResults();
        if($res==NULL){
            $TMessage[]="Login incorrect";
            require '../vue/erreur.php';
        }
    }

}