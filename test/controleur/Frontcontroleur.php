<?php


class Frontcontroleur
{
    private $actionAdmin= array('deconnexion','addNews','deleteNews','getNewsAdmin');
    private $actionUser=array('connexion','getNews');

    function __construct()
    {
        global $rep, $vues,$Tmessage;

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
                    require($rep . $vues['vuehome']);
                }
            }
        }catch (PDOException $e) {

            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['vuehome']);

        }
    }

}






































