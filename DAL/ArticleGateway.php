<?php

class ArticleGateway {
    private $con;
    
    public function __construct(Connection $connection) {
        $this->con = $connection;
    }
    
    public function addArticle($id, $titre, $resume, $dateParution) {
        $query='INSERT INTO Article VALUES(:id, :titre, :resume, :dateParution)';
        
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT),
            ':titre' => array($titre, PDO::PARAM_STR),
            ':resume' => array($resume, PDO::PARAM_STR),
            ':dateParution' => array($dateParution, PDO::PARAM_STR)));
        
        return $this->con->lastInsertId();
    }

    public function findAllArticles() {
        $query='Select * from Article';

        $this->con->executeQuery($query);
        $results=$this->con->getResults();
        foreach($results as $row)
        {
            $tabArticles[]=new Article($row['id'], $row['titre'], $row['resume'], $row['dateParution']);
        }
        return $tabArticles;
    }

    public function editArticle($id, $titre, $resume) {
        $query='UPDATE Article SET titre=:titre, resume=:resume WHERE id=:id';
        
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT),
            ':titre' => array($titre, PDO::PARAM_STR),
            ':resume' => array($resume, PDO::PARAM_STR)));
    }
    
    public function deleteArticle($id) {
        $query='DELETE FROM Article WHERE id=:id';
        
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
    }
}


