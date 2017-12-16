<?php


class BookGatewayAdmin
{
    public function getPass($username,$passwd)
    {
        global $base,$mdp,$login;
        try{
            $con=new Connection($base,$login,$mdp);
        }
        catch (PDOException $e){
            throw new Exception("pb connexion");
        }
        $query='SELECT count(*) FROM admin WHERE login=:login and password=:passwd';
        $con->executeQuery($query,array(':login'=>array($username,PDO::PARAM_STR),':passwd'=>array($passwd,PDO::PARAM_STR)));
        $result=$con->getResults();
        if($result[0][0]!=1){
            return false;
        }
        return true;
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