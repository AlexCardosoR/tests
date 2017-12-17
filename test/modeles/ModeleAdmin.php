<?php


class ModeleAdmin
{
    function guidVerif($guid){
        $g=new NewsGatewayAdmin(new Connection());
        return $g->guidVerif($guid);
    }

    function deleteNews($guid){
        $g=new NewsGatewayAdmin(new Connection());
        return $g->deleteNews($guid);
    }

    function addNews($titre, $description, $lien, $datesortie, $categorie){
        $g=new NewsGatewayAdmin(new Connection());
        return $g->addNews($titre,$description,$lien,$datesortie,$categorie);
    }

    function deconnexion() {
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

}