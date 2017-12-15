<?php


class ModeleAdmin
{
    private $book;

    public function __construct()
    {
        $this->book= new BookGatewayAdmin();

    }

    function deconnexion() {

    }

}