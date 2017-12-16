<?php


class Connection extends PDO
{

    private $stmt ;

    public function __construct() {

        parent::__construct("mysql:host=;dbname=root","root","");
        $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }


    public function executeQuery($query,array $parameters = [] ) {

        $this->stmt=parent::prepare($query);

        foreach($parameters as $name => $value) {
            $this->stmt->bindValue($name,$value[0],$value[1]);
        }
        try {
            $this->stmt->execute();
        }
        catch (PDOException $exception){
            echo $exception;
        }
        return $this->stmt;
    }

    public function getResults() {
        return $this->stmt->fetchAll();
    }

}








