<?php


class AdminControleur
{

    function __construct()
    {
        global $rep, $vues;

        $Tmessage = array();

        try {

            $action = $_REQUEST['action'];

            switch ($action) {

                case NULL:
                    $this->Reinit();
                    break;

                case "deconnexion";
                    $this->deconnexion();
                    break;
                case "addNews";
                    $this->addNews();
                    break;
                case "deleteNews";
                    $this->deleteNews();
                    break;
                default:
                    $Tmessage[] = "Erreur PHP";
                    require($rep . $vues['erreur']);
                    break;
            }
        } catch (PDOException $e) {
            $dVueEreur[] = "Erreur inattendue! ";
            require($rep . $vues['erreur']);

        } catch (Exception $e2) {
            $dVueEreur[] = "Erreur inattendue! ";
            require($rep . $vues['erreur']);
        }
    }


    function Reinit()
    {
        global $rep, $vues;

        require($rep.$vues['vueAdmin']);
    }

    function deleteNews(){
        global $rep, $vues,$Tmessage;
        $guid=$_POST['guid'];
        if (isset($guid)){
            if (!$guid=Validation::validInt($guid)) {
                $Tmessage[] = 'Erreur : guid non valide';
            }
            $modele = new ModeleAdmin();

            $guidExist= $modele->guidVerif($guid);
            if ($guidExist){
                $retour = $modele->deleteNews($guid);
                $Tmessage[]='News supprimé !';
            }
            else{
                $Tmessage[]='Erreur : guid non existant dans la base de donnée';
            }


            require ($rep.$vues['vueAdmin']);
        }
    }

    function addNews()
    {
        global $rep, $vues,$Tmessage;
        $titre=$_POST['titre'];
        $description=$_POST['description'];
        $lien=$_POST['lien'];
        $datesortie=$_POST['datesortie'];
        $categorie=$_POST['categorie'];

        if(count($_POST)>0){

            if (!$titre=Validation::validString($titre)) {
                $Tmessage[] = 'Erreur : Titre non valide';
            }
            if (!$description=Validation::validString($description)) {
                $Tmessage[] = 'Erreur : Description non valide';
            }
            if (!$lien=Validation::validString($lien)) {
                $Tmessage[] = 'Erreur : Lien non valide';
            }
            if (!$datesortie=Validation::validString($datesortie)) {
                $Tmessage[] = 'Erreur : Date non valide';
            }
            if (!$categorie=Validation::validString($categorie)) {
                $Tmessage[] = 'Erreur : Catégorie non valide';
            }

            $modele = new ModeleAdmin();

            $data = $modele->addNews($titre,$description,$lien,$datesortie,$categorie);

            if($data){
                $Tmessage[]="News ajoutée !!";
            }

            require ($rep.$vues['vueAdmin']);
        }
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