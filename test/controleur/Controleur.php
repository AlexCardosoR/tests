<?php


class Controleur
{

    function __construct()
    {
        global $rep, $vues,$Tmessage;

        try {

            if(!isset($_REQUEST['action']) && !isset($_GET['page'])){
                $this->getNews();
            }

            if(!empty($_GET['page'])){
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

                        $this->getNews();
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
        require($rep . $vues['vuehome']);

    }

    private function initPage(){

        if (isset($_POST['nbrAffichage'])) {

            $nbrAffichage=$_POST['nbrAffichage'];

            if (!$nbrAffichage = Validation::validString($nbrAffichage)) {
                $Tmessage[] = 'Erreur : Nombre à afficher non valide';
            }
        }
        else{
            $nbrAffichage=5;
        }

        $modele=new ModeleUtilisateur();
        $nbrInfo= $modele->getNbrInfo();

        $nbrPages=ceil($nbrInfo/$nbrAffichage);
        if(isset($_GET['page'])){
            $pageActuelle=intval($_GET['page']);
            if($pageActuelle>$nbrPages){
                $pageActuelle=$nbrPages;
            }
            else{
                $pageActuelle='1';
            }
            $premiereEntree=($pageActuelle-1)*$nbrAffichage;
        }

        $this->getNews($premiereEntree);

    }


    protected function getNews($premiereEntree = null)
    {
        global $rep, $vues,$Tmessage;

        if(!isset($premiereEntree) || $premiereEntree==null){
            $premiereEntree='1';
            $pageAcuelle=1;
            $nbrPages=1;
        }

        if (isset($_POST['nbrAffichage'])) {

            $nbrAffichage=$_POST['nbrAffichage'];

            if (!$nbrAffichage = Validation::validString($nbrAffichage)) {
                $Tmessage[] = 'Erreur : Nombre à afficher non valide';
            }
        }
        else{
            $nbrAffichage=5;
        }

        $modele = new ModeleUtilisateur();

        $nbrAffichage= (int) $nbrAffichage;
        $premiereEntree= (int) $premiereEntree;

        $data = $modele->getNews($premiereEntree,$nbrAffichage);

        $_POST['pageActuelle']=$pageAcuelle;
        $_POST['nbrPages']=$nbrPages;
        require ($rep.$vues['vuehome']);
    }

    private function getNewsSansRedirection(){

        $modele = new ModeleUtilisateur();

        return $modele->getNews(5);
    }

    private function connexion()
    {
        session_start();
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
                $data = $modele->getNews(5);

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


