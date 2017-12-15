<?php


class Validation
{


    public static function  validEmail( string $email): bool {

        $rep = filter_var($email ,FILTER_VALIDATE_EMAIL );
        echo $rep ;
        return $rep ;



}

    public static function validNom(string $nom ) : string {
        $rep =filter_var($nom ,FILTER_SANITIZE_STRING );
        echo $rep ;
        return $rep ;

    }


    public static function validPrenom(string $prenom ) : string {
        $rep = filter_var($prenom ,FILTER_SANITIZE_STRING );
        echo $rep ;
        return $rep ;

    }



}