<html>
<head>
    <meta charset="utf-8">

    <title>NEWS - RSS</title>

</head>
<body>

<header>

    <h1>NEWS - RSS</h1>

</header>

<main>
    <div id="formConnexion">
        <h3>Connectez-vous</h3>
        <p>marche pas </p>
        <form method="post" action="?action=connexion">
            Login :
            <input  value="root" type="text" name="name" required />
            Password :
            <input value="root" type="text" name="passwd" required />

            <input type="submit" value="Se connecter"/>
        </form >
    </div>

    <h2>News</h2>
    <p>
        <?php
        foreach ($data as $news) :
            echo $news->getTitre()."          "." | ";
            echo $news->getDescription()." | ";
            echo $news->getLien()." | ";
            echo $news->getGuid()." | ";
            echo $news->getDatesortie()." | ";
            echo $news->getCategorie()."<br />\n";

        endforeach;
        ?>
    </p>
</main>

</body>

</html>

























</html>
