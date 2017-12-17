<html>
<head>

    <meta charset="utf-8">
    <title>NEWS - RSS - ADMIN</title>
    <meta name="viewport" content="width=device-width">
    <style>
        <?php
        include('styles/vueAdminstyle.css');
        ?>
    </style>
</head>
<body>

<header>

    <h1>ADMIN PAGE</h1>
    <a href="index.php"><H1>ACCEUIL</H1></a>
</header>

<main>
    <div id="listeNews">
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

        <form method="post" action="?action=getNewsAdmin" >
            <select name="nbrAffichage" size="0" >
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <input type="submit" value="Ok"/>
        </form>

    </div>
    <div id="insertion">
        <p>Insertion News</p>
        <form method="post" action="?action=addNews">
            <fieldset>
                <p>Titre:</p>
                <input  value="test" placeholder="Titre" type="text" name="titre" required />
                <p>Description:</p>
                <textarea value="test" name="description" required >
                </textarea>
                <p>Lien:</p>
                <input value="http://test.com" placeholder="Lien" type="url" name="lien" required />
                <p>Date:</p>
                <input type="date"  name="datesortie" required />
                <p>Categorie:</p>
                <input value="test" placeholder="Categorie" type="text" name="categorie" required />
                <input value="Insérer" type="submit">
            </fieldset>
        </form>
    </div>

    <div id="suppression">
        <p>Suppression News</p>
        <form method="post" action="?action=deleteNews">
            <fieldset>
                <p>GUID:</p>
                <input type="number" name="guid" min="0" required />
                <input type="submit" value="Supprimer"/>
            </fieldset>
        </form>
    </div>

    <form method="post" action="?action=deconnexion">
    <input type="submit" value="Déconnexion">
    </form>
    <?php require("erreur.php");?>

</main>
</body>




</html>
