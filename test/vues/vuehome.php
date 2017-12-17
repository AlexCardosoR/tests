<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title>NEWS - RSS</title>
    <meta name="viewport" content="width=device-width"/>
    <style>
        <?php

        include('styles/vuehomestyle.css');

        ?>
    </style>

</head>

<body>

<header>
    <div class="arrierePlan">
        <div class="entete">
            <h1>NEWS - RSS</h1>

            <div id="formConnexion">
                <h3>Connectez-vous :</h3>
                <form method="post" action="?action=connexion">
                    <fieldset id="Connexion">

                        <div>
                            <div>
                                <p>Login :</p>
                                <input  value="root" type="text" name="login" required />
                            </div>
                            <div>
                                <p>Password :</p>
                                <input value="root" type="password" name="passwd" required />
                            </div>
                        </div>

                        <input type="submit" value="Se connecter"/>

                    </fieldset>
                </form >
            </div>
        </div>
    </div>
</header>

<main>
    <div class="arrierePlan">

        <h2>News</h2>
        <div class="articles">
            <?php
            if(!empty($data)) {
                foreach ($data as $news) :
                    echo "<div class='article'>";
                    echo '<a href="'.$news->getLien().'"><h3>'.$news->getTitre()."</h3></a>";
                    echo "<p>".$news->getCategorie() . "</p>";
                    echo "<p class='description'>".$news->getDescription()."</p>";
                    echo "<p>".$news->getDatesortie()."</p>";
                    echo "</div><hr>";
                endforeach;
            }
            ?>
        </div>
        <div class="navigation">
            <?php
            $pageActuelle=$_POST['pageActuelle'];
            $nbrPages=$_POST['nbrPages'];
            if($pageActuelle!=1){
                $precedent=$pageActuelle-1;
                echo'<a class="pagination_suivant" href="index.php?page='.$precedent.'">precedent</a>';
            }
            for($i=1; $i<=$nbrPages; $i++){
                echo'<a class="pagination" href="index.php?page='.$i.'">'.$i.'</a>';
            }
            if($pageActuelle<$nbrPages){
                $suivant= $pageActuelle+1;
                echo'<a class="pagination_suivant" href="index.php?page='.$suivant.'">suivant</a>';
            }
            $_POST['pageActuelle']=$pageActuelle;
            $_POST['nbrPages']=$nbrPages;
            ?>
        </div>

           <?php echo '<form class="nbrAff" method="post" action="?page='.htmlspecialchars($_POST['pageActuelle']).'" >'; ?>
                <p>Nombre à afficher :</p>
                <?php echo '<input type="number" name="nbrAffichage" value="'.htmlspecialchars($_SESSION['nbrAffichage']).'" min="5" max="20" step="5"/>'; ?>
                <input type="submit" value="Ok"/>
            </form>

    </div>
</main>
<div class="arrierePlan">
    <?php require("erreur.php");?>
</div>
</body>

</html>