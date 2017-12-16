<?php


class Validation
{


    public static function  validEmail($email){

        if (!empty($email)) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
        return false;
    }

    public static function validString($nom ) {
        if (!empty($nom)) {
             return filter_var($nom, FILTER_SANITIZE_STRING);
        }
        return false;
    }

/*
    public static function validInt($number ) {
        if (!empty($number)) {
            return filter_var($number, FILTER_VALIDATE_INT);
        }
        return false;
    }
*/


}