<?php


/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 12/17/2015
 * Time: 16:10
 */
class UserController
{
    function __construct()
    {
        $TMessage=[];
        global $rep, $vues;
        try {
            $action=$_REQUEST['action'];
            echo "<br>";
            var_dump($action);
            echo "<- Action de UserController";
            switch($action) {
                case NULL:
                    $this->afficherAccueil();
                    break;
                case "lister":
                    $this->listerTout();
                    break;
                default:
                    $TMessage = "Erreur";
                    require('../vue/erreur.php');
            }
        }
        catch (PDOException $e)
        {
            $e->getMessage();
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require $rep.$vues['erreur'];
        }
        catch (Exception $e2)
        {
            $e2->getMessage();
            $dVueEreur[] =	"Erreur inattendue!!! ";
            require $rep.$vues['erreur'];
        }
    }

    function listerTout(){

        global $rep, $vues;

        $a=new MdlArticle();
        $tabArticles=$a->getListArticles();
        require ($rep.$vues['accueil']); //TODO : afficher le vrai accueil. Probablement un probleme de lien
    }

    function afficherAccueil() {

        global $rep, $vues;
        $tabArticles=[];
        require ($rep.$vues['default']);
    }
}