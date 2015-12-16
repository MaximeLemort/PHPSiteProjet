<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of classConnection
 *
 * @author mobouafas1
 */
class classConnection extends PDO {
    private $stmt;
    
    public function __construct($dsn, $username, $passwd) {
        parent::__construct($dsn, $username, $passwd);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function executeQuery($query, array $parameters = []) {
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }
    
    public function getResults() {
        return $this->stmt->fetchAll();
    }
}
