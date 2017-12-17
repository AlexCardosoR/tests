<?php


class Controleur
{

    function __construct()
    {
        global $rep, $vues,$Tmessage;

        try {
            session_start();
            if(!isset($_REQUEST['action']) && !isset($_GET['page'])){
                $this->initPage();
            }

            if(!empty($_GET['page'])){
                echo $_SESSION['nbrAffichage'];
                $this->initPage();
            }

            if(!empty($_REQUEST['action'])) {

                $action = $_REQUEST['action'];


                switch ($action) {

                    case NULL :
                        $this->Reinit();
                        break;

                    case 'connexion':

                        $this->connexion();
                        break;

                    case 'getNews' || 'deconnexion' :

                        $this->initPage();
                        break;

                    default:
                        $Tmessage[] = "Erreur Action Inconnue";
                        require($rep . $vues['vuehome']);
                        break;
                }
            }
        } catch (PDOException $e) {
            echo $e->getmessage();
            $Tmessage[] = "Erreur PDO inattendue! ";
            require($rep . $vues['vuehome']);
        }
        catch (Exception $e2) {
            echo $e2->getmessage();
            $Tmessager[] = "Erreur inattendue! ";
            require($rep . $vues['vuehome']);
        }
    }

    private function Reinit()
    {
        global $rep, $vues;
        unset($_POST);
        unset($_GET);
        unset($_REQUEST);
        require($rep . $vues['vuehome']);

    }

    private function getNbrAffichage(){

        if (isset($_POST['nbrAffichage']) || isset($_SESSION['nbrAffichage'])) {

            if(isset($_POST['nbrAffichage'])){
                $_SESSION['nbrAffichage']=$_POST['nbrAffichage'];
            }

            $nbrAffichage=intval($_SESSION['nbrAffichage']);
            if (!$nbrAffichage = Validation::validInt($nbrAffichage)) {
                $Tmessage[] = 'Erreur : Nombre à afficher non valide';
                echo"patatra";
                return 5;
            }
            return $nbrAffichage;
        }
        $_SESSION['$nbrAffichage']=5;
        return 5;
    }

    private function initPage(){

        $modele=new ModeleUtilisateur();
        $nbrInfo= $modele->getNbrInfo();
        $nbrPages=ceil($nbrInfo/$this->getNbrAffichage());

        if(isset($_GET['page'])) {

            $pageActuelle = intval($_GET['page']);

            if (!$pageActuelle = Validation::validInt($pageActuelle)) {
                $Tmessage[] = 'Erreur : Nombre à afficher non valide';
                $pageActuelle = 1;
            } else {
                if ($pageActuelle > $nbrPages) {
                    $pageActuelle = $nbrPages;
                }
                if ($pageActuelle < 1) {
                    $pageActuelle = 1;
                }
            }

            $premiereEntree = ($pageActuelle - 1) * $this->getNbrAffichage();
        }

        else{
            $pageActuelle=1;
            $premiereEntree=0;
        }

        $_POST['pageActuelle']=$pageActuelle;
        $_POST['nbrPages']=$nbrPages;
        $this->getNews($premiereEntree);

    }


    protected function getNews($premiereEntree)
    {
        global $rep, $vues;

        $modele = new ModeleUtilisateur();

        $premiereEntree= (int) $premiereEntree;

        $data = $modele->getNews($premiereEntree,$this->getNbrAffichage());

        $_SESSION['nbrAffichage']=$this->getNbrAffichage();

        require ($rep.$vues['vuehome']);
    }

    private function getNewsSansRedirection(){

        $modele = new ModeleUtilisateur();

        return $modele->getNews(5);
    }

    private function connexion()
    {
        global $rep,$vues,$Tmessage;
        $username = $_POST['login'];
        $passwd = $_POST['passwd'];

        if(count($_POST)>0){

            if (!$url=Validation::validString($username)) {
                $Tmessage[] = 'Erreur : Login Non valide';
            }

            if (!$name=Validation::validString($passwd)) {
                $Tmessage[] = 'Erreur : Password Non valide';
            }

            $modele = new ModeleUtilisateur();

            $connexion = $modele->connexion($username,$passwd);


            if ($connexion) {
                $Tmessage[]="pas d'erreur";
                $modele = new ModeleUtilisateur();
                $data = $modele->getNews(0,15);

                require($rep.$vues['vueAdmin']);
            }
            else{
                $Tmessage[] = "login ou password invalide";
                $data=$this->getNewsSansRedirection();
                require($rep . $vues['vuehome']);
            }
        }
    }
}


