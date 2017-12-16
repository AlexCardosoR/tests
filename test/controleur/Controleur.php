<?php


class Controleur
{

    function __construct()
    {
        global $rep, $vues,$Tmessage;

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

                    case 'getNews':

                        $this->getNews();
                        break;

                    default:
                        echo 'afaire erreur';
                        break;

                }
            }
        } catch (PDOException $e) {
            echo $e->getmessage();
            $Tmessage[] = "Erreur PDO inattendue!!! ";
            require($rep . $vues['erreur']);
        }
        catch (Exception $e2) {
            echo $e2->getmessage();
            $Tmessager[] = "Erreur inattendue!!! ";
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


        if (isset($_POST['nbrAffichage'])) {

            $nbrAffichage=$_POST['nbrAffichage'];

            if (!$nbrAffichage = Validation::validString($nbrAffichage)) {
                $Tmessage[] = 'Erreur : Nombre à afficher non valide';
            }
        }
        else{
            $nbrAffichage=15;
        }

        $modele = new ModeleUtilisateur();

        $nbrAffichage= (int) $nbrAffichage;

        $data = $modele->getNews($nbrAffichage);


        require ($rep.$vues['vuehome']);
    }

    private function connexion()
    {

        global $rep,$vues,$Tmessage;
        $username = $_POST['login'];
        $passwd = $_POST['passwd'];

        if(count($_POST)>0){

            if (!$url=Validation::validString($username)) {
                $Tmessage[] = 'Erreur : Url Non valide';
            }

            if (!$name=Validation::validString($passwd)) {
                $Tmessage[] = 'Erreur : Name Non valide';
            }

            $modele = new ModeleUtilisateur();

            $connexion = $modele->connexion($username,$passwd);
            $_SESSION['role']='admin';
            $_SESSION['login']=$username;

            if ($connexion) {
                require($rep.$vues['vueAdmin']);
            }
            else{
                $Tmessage[] = "login ou password invalide";
                require($rep . $vues['erreur']);
            }
        }
    }
}


