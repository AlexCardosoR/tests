<?php


class BookGateway
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection= $connection ;

    }


    public function getNews(){

        $query='SELECT * from news where 1';
        $this->connection->executeQuery($query);

        $result=$this->connection->getResults();

        foreach($result as $row){
            $tab[] = new News($row['titre'],$row['description'],$row['lien'],$row['guid'],$row['date'],$row['categorie']);
        }

        return $tab;
    }


    /**public function insertNews($titre,$description,$lien,$guid,$datesortie,$categorie){
    $query="INSERT INTO news values(:titre,:description,:lien,:guid,:datesortie,:categorie)";
    $this->connection->executeQuery($query,array(':titre'->array($titre,PDO::PARAM_STR)},':description'->array($description,PDO::PARAM_STR),':lien'->array($lien,PDO::PARAM_STR),':guid'->array($guid,PDO::PARAM_STR),'datesortie'->array('categorie'->array($categorie,PDO::PARAM_STR))));
    }


    public function  deleteNews($guid){
    $query="DELETE FROM news WHERE news.guid=$guid";
    $this->connection->executeQuery($query,array(':guid'->array($guid,PDO::PARAM_STR)));
    }
     **/
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

