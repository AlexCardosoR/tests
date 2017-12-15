<?php


class Frontcontroleur
{
private $actionAdmin= array('deconnexion','addRSS','deleteRSS');
private $actionUser=array('connexion');

    function __construct()
    {
        global $rep, $vues;


        session_start();
        $dVueErreur = array();

        try {
            $action = $_REQUEST['action'];
            if (in_array($action,$this->actionAdmin)) {
                new AdminControleur();

            } else if (in_array($action, $this->actionUser) || $action == NULL){
                new Controleur();
            }

            else {
                $dVueErreur[] = "Action inconnue";
                require($rep . $vues['erreur']);

            }

        }catch (PDOException $e) {

            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);

        }
        exit(0);
    }



}






































