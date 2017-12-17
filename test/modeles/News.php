<?php


class News
{
    private $titre;
    private $description;
    private $lien;
    private $guid;
    private $datesortie;
    private $categorie;

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * @return mixed
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * @return mixed
     */
    public function getDatesortie()
    {
        return $this->datesortie;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }


    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $lien
     */
    public function setLien($lien)
    {
        $this->lien = $lien;
    }

    /**
     * @param mixed $guid
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;
    }

    /**
     * @param mixed $datesortie
     */
    public function setDatesortie($datesortie)
    {
        $this->datesortie = $datesortie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * News constructor.
     * @param $titre
     * @param $description
     * @param $lien
     * @param $guid
     * @param $datesortie
     * @param $categorie
     */

    public function __construct($titre, $description, $lien, $guid, $datesortie, $categorie)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->lien = $lien;
        $this->guid = $guid;
        $this->datesortie = $datesortie;
        $this->categorie = $categorie;
    }
}
