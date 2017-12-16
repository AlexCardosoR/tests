





<html>
<body>
<h4>Messages :</h4>
<?php
if(isset($Tmessage) || !empty($Tmessage)) {
    foreach ( $Tmessage as $value ) {
        echo $value; echo "</br>";
    }
}
else {
    echo " pas d'erreur " ;
}
?>

</body>
</html>



