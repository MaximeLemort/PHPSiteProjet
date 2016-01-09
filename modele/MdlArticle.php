<?php


class MdlArticle {

    public function getListArticles() {

        global $base;
        global $login;
        global $mdp;

        $ag=new ArticleGateway(new Connection($base, $login, $mdp));
        $tabArticles=$ag->findAllArticles();
        return $tabArticles;
    }
    
    public function addArticle($id, $titre, $resume, $dateParution) {

        global $base;
        global $login;
        global $mdp;

        var_dump($id);
        var_dump($titre);
        var_dump($resume);

        $ag=new ArticleGateway(new Connection($base, $login, $mdp));
        $i=$ag->addArticle($id, $titre, $resume, $dateParution); //recup l'id
    }
    
    public function editArticle($id, $titre, $resume) {

        global $base;
        global $login;
        global $mdp;

        $ag=new ArticleGateway(new Connection($base, $login, $mdp));
        $ag->editArticle($id, $titre, $resume);
    }
    
    public function deleteArticle($id) {
        global $base;
        global $login;
        global $mdp;

        $ag=new ArticleGateway(new Connection($base, $login, $mdp));
        $ag->deleteArticle($id);
    }

    public function getDetailArticle($id){

        global $base;
        global $login;
        global $mdp;

        $ag=new ArticleGateway(new Connection($base, $login, $mdp));

        $article=$ag->findArticle($id);
        return $article;
    }
}
