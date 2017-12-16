<?php

class ModeleUtilisateur
{
    private $news;

    function connexion($username,$passwd)
    {
        $this->news= new NewsGatewayAdmin(new Connection());

        return $this->news->getPass($username,$passwd);
    }


    function getNews($nbrAffichage) {

        $g=new NewsGateway(new Connection());
        $data=$g->getNews($nbrAffichage);
        return $data;
    }



}
