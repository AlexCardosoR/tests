<html>
<head>
    <meta charset="utf-8">

    <title>NEWS - RSS</title>

</head>
<body>

<header>

    <h1>NEWS - RSS</h1>
    <description> Retrouvez les dernières actualités francaise ou bien du monde entier</description>
</header>

<div id="formConnexion">
    <h3>Connectez-vous
        //marche pas il faut faire en sorte qu'il dise que c'est un User aussi
    <form method="post" action="?action=connexion">
        Login :
        <input  value="root" type="text" name="login" required />
        Password :
        <input value="root" type="text" name="password" required />

         <input type="submit" value="Se connecter"/>
    </form>



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


</body>



























</html>
