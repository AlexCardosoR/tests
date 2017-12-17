<?php

class ModeleUtilisateur
{
    private $news;

    function connexion($username,$passwd)
    {
        $this->news= new NewsGatewayAdmin(new Connection());

        return $this->news->getPass($username,$passwd);
    }

    function getNbrInfo(){
        $g=new NewsGateway(new Connection());
        $data=$g->getNbrInfo();
        return $data;
    }

    function getNews($premiereEntree,$nbrAffichage) {

        $g=new NewsGateway(new Connection());
        $data=$g->getNews($premiereEntree,$nbrAffichage);
        return $data;
    }



}
