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



}

