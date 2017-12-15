<?php

class ModeleUtilisateur
{
    private $book;

    public function __construct()
    {


    }

    function connexion()
    {
        $this->book= new BookGatewayAdmin();
        $username = $_POST['name'];
        $passwd = $_POST['passwd'];

        return $this->book->getPass($username,$passwd);
    }


    function getNews() {

        $g=new BookGateway(new Connection());
        $data=$g->getNews();
        return $data;
    }



}
