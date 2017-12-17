<?php


class NewsGateway
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection= $connection ;

    }


    public function getNews($premiereEntree,$nbrAffichage){

        $query='SELECT * FROM news ORDER BY date DESC LIMIT :premiereEntree,:nbrAffichage';
        $this->connection->executeQuery($query,array(':premiereEntree'=>array($nbrAffichage,PDO::PARAM_INT),':nbrAffichage'=>array($nbrAffichage,PDO::PARAM_INT)));
        $result=$this->connection->getResults();

        foreach($result as $row){
            $tab[] = new News($row['titre'],$row['description'],$row['lien'],$row['guid'],$row['date'],$row['categorie']);
        }

        if(empty($tab)){
            $tab[]= new News('Pas de News','','','0','','');
            return $tab;
        }
        return $tab;
    }

    public function getNbrInfo()
    {
        $query='SELECT count(*) FROM news ';
        $this->connection->executeQuery($query);
        $result=$this->connection->getResults();
        return $result[0][0];
    }

}

