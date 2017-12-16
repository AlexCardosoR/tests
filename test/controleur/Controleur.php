<?php


class Controleur
{
    function __construct()
    {
        global $rep, $vues;



        $dvueErreur = array();



        try {

            if(!isset($_REQUEST['action'])){
                $this->getNews();
            }

            if(!empty($_REQUEST['action'])) {
                $action = $_REQUEST['action'];

                switch ($action) {

                    case 'connexion':

                        $this->connexion();
                        break;

                    default:
                        echo 'afaire erreur';
                        break;

                }
            }
        } catch (PDOException $e) {
            echo $e->getmessage();
            $dVueEreur[] = "Erreur PDO inattendue!!! ";
            require($rep . $vues['erreur']);
        }
        catch (Exception $e2) {
            echo $e2->getmessage();
            $dVueEreur[] = "Erreur inattendue!!! ";
            require($rep . $vues['erreur']);
        }
    }

    function Reinit()
    {
        global $rep, $vues;
        require($rep . $vues['Pagedacceuil']);

    }


    function getNews()
    {
        global $rep, $vues;

        $modele = new ModeleUtilisateur();

        $data = $modele->getNews();

        require ($rep.$vues['vuehome']);
    }

    private function connexion()
    {

        global $rep,$vues;
        //vérif ici les $_POST
        $modele = new ModeleUtilisateur();

        $connexion = $modele->connexion();//les envoyer en param

        if ($connexion) {
            require($rep.$vues['vueAdmin']);

        }
        else echo 'afaire';

    }
}


