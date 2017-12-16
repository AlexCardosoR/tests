<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>NEWS - RSS</title>
    <meta name="viewport" content="width=device-width">
</head>

<body>

<header>

    <h1>NEWS - RSS</h1>

    <div id="formConnexion">
        <h3>Connectez-vous</h3>
        <form method="post" action="?action=connexion">
            <fieldset>
                <p>Login :</p>
                <input  value="root" type="text" name="login" required />
                <p>Password :</p>
                <input value="root" type="password" name="passwd" required />

                <input type="submit" value="Se connecter"/>
            </fieldset>
        </form >
    </div>

</header>

<main>


    <h2>News</h2>
    <p>
        <?php
        if(!empty($data)) {
            foreach ($data as $news) :
                echo $news->getTitre() . "          " . " | ";
                echo $news->getDescription() . " | ";
                echo $news->getLien() . " | ";
                echo $news->getGuid() . " | ";
                echo $news->getDatesortie() . " | ";
                echo $news->getCategorie() . "<br />\n";

            endforeach;
        }
        ?>
    </p>

    <form id="selecRange" method="post" action="?action=getNews" >
        <input type="number" value="10" max="50" step="5" name="nbrAffichage" />
        <input type="submit" value="Ok"/>
    </form>

</main>
<?php require("erreur.php");?>
</body>

</html>

























</html>
