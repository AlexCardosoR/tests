





<html>
<body>

<?php
if(isset($Tmessage)) {
    ?>
    <h1>Erreur</h1>
    <?php
foreach ( $Tmessage as $value ) { echo $value; echo "</br>"; } }

else { echo "pas d'erreur " ;}

?>

</body>
</html>



