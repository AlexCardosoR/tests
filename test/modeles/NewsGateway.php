<?php


class NewsGateway
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection= $connection ;

    }


    public function getNews($nbrAffichage){

        $query='SELECT * FROM news ORDER BY date DESC LIMIT :nbrAffichage';
        $this->connection->executeQuery($query,array(':nbrAffichage'=>array($nbrAffichage,PDO::PARAM_INT)));
        $result=$this->connection->getResults();

        foreach($result as $row){
            $tab[] = new News($row['titre'],$row['description'],$row['lien'],$row['guid'],$row['date'],$row['categorie']);
        }

        if(!empty($tab)){
            return $tab;
        }
    }



}

