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
            switch($action) {
                case NULL:
                    $this->afficherAccueil();
                    break;
                case "lister":
                    $this->listerTout();
                    break;
                case "detail":
                    $this->afficherDetail();
                    break;
                default:
                    $TMessage = "Erreur";
                    require $rep.$vues['erreur'];
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
        require ($rep.$vues['accueil']);
    }

    function afficherDetail() {
        global $rep, $vues;
        $id=$_POST['id'];
        if(validation::validateChaine($id, 'id')) {
            $a = new MdlArticle();
            $article = $a->getDetailArticle($id);
            require($rep . $vues['detail']);
        }
        else require $rep.$vues['default'];
    }

    function afficherAccueil() {

        global $rep, $vues;
        $tabArticles=[];
        require ($rep.$vues['default']);
    }
}