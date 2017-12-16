<?php


class Frontcontroleur
{
    private $actionAdmin= array('deconnexion','addNews','deleteNews');
    private $actionUser=array('connexion','getNews');

    function __construct()
    {
        global $rep, $vues,$Tmessage;


        session_start();

        try {
            if(!isset($_REQUEST['action'])){
                new Controleur();
            }
            if(!empty($_REQUEST['action'])){
                $action = $_REQUEST['action'];

                if (in_array($action, $this->actionAdmin)) {
                    new AdminControleur();
                }

                else if (in_array($action, $this->actionUser)) {
                    new Controleur();
                }
                else{
                    $Tmessage[] = "Action inconnue";
                    require($rep . $vues['erreur']);
                }
            }
        }catch (PDOException $e) {

            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);

        }
    }

}






































