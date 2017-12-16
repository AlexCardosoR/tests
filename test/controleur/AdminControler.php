<?php


class AdminControleur
{

    function __construct()
    {
        global $rep, $vues;



        $dVueErreur = array();

        try {
            $action = $_REQUEST['action'];

            switch ($action) {

                case NULL:
                    Reinit();
                    break;

                case "deconnexion";
                    deconnexion();
                    break;
                case "addRSS";
                    addRSS();
                    break;
                case "deleteNews";
                    deleteNews();
                    break;
                default:
                    $dVueErreur[] = "Erreur PHP";
                    require(__DIR__ . '/../vues/Erreur.php');
                    break;
            }
        } catch (PDOException $e) {
            //si erreur BD, pas le cas ici
            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }
    }

    function Reinit()
    {
        require(__DIR__ . '/../vues/vuehome.php');

    }

    function deconnexion()
    {
        global $rep, $vues;

        $modele = new ModeleAdmin();

        $deconnexion= $modele->deconnexion();

    }


}

?>







































}