<?php


class BookGatewayAdmin
{
    private $connection;
    public function getPass($username,$passwd)
    {
        global $base,$mdp,$login;
        try{
            $con=new Connection($base,$login,$mdp);
        }catch (PDOException $e){
            throw new Exception("pb connexion");
        }
        $query='SELECT count(*) FROM admin WHERE login=:login and pass=:passwd';
        $con->executeQuery($query,array(':login'=>array($username,PDO::PARAM_STR),':passwd'=>array($passwd,PDO::PARAM_STR)));
        $result=$con->getResults();
        if($result!=1){
            return false;
        }
        return true;
    }
}