<?php


class NewsGatewayAdmin
{

    private $connection;
    public function __construct($connection)
    {
        $this->connection= $connection ;
    }

    public function getPass($username,$passwd)
    {
        $query='SELECT count(*) FROM admin WHERE login=:login and password=:passwd';
        $this->connection->executeQuery($query,array(':login'=>array($username,PDO::PARAM_STR),':passwd'=>array($passwd,PDO::PARAM_STR)));
        $result=$this->connection->getResults();
        if($result[0][0]!=1){
            return false;
        }
        return true;
    }

    public function addNews($titre,$description,$lien,$datesortie,$categorie){
        $query="INSERT INTO news (`titre`, `description`, `lien`, `date`, `categorie`) VALUES (:titre,:description,:lien,:datesortie,:categorie)";

        $this->connection->executeQuery($query,array(':titre'=>array($titre,PDO::PARAM_STR),':description'=>array($description,PDO::PARAM_STR),':lien'=>array($lien,PDO::PARAM_STR),'datesortie'=>array($datesortie,PDO::PARAM_STR),'categorie'=>array($categorie,PDO::PARAM_STR)));

        return $this->connection;
    }

    public function guidVerif($guid){
        $query="SELECT count(*) FROM news WHERE `guid`=:guid";
        $this->connection->executeQuery($query,array(':guid'=>array($guid,PDO::PARAM_INT)));
        $result=$this->connection->getResults();
        if($result[0][0]!=1){
            return false;
        }
        return true;
    }


    public function  deleteNews($guid){
    $query="DELETE FROM news WHERE guid=:guid";
    $this->connection->executeQuery($query,array(':guid'=>array($guid,PDO::PARAM_INT)));
    return $this->connection;
    }

    /**
    public function triNews($categ){
    $query = "SELECT * FROM news where news.categorie=$categ";
    $this->connection->executeQuery($query, array(':categ'->array($categ, PDO::PARAM_STR)));
    $result = $this->connection->getResult();
    foreach ($result as $row) {
    $tab[] = new News('$row['titre']','$row['description']','$row['lien']','$row['guid']','$row['datesortie']','$row['categorie']');
    }
    return $tab;
    }
     **/
}