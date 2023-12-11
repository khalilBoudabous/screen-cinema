<?php
class film
{
    private ?int $id_film = null;
    private ?string $titre_film = null;
    private ?string $duree = null;
    private ?string $realisateur = null;
    private ?float $etoils = null;
    private ?int $id_c = null;

    public function __construct($id_film, $t, $d, $r, $e )
    {
        $this->id_film = $id_film;
        $this->titre_film = $t;
        $this->duree = $d;
        $this->realisateur = $r;
        $this->etoils = $e;
    }


    public function getIdfilm()
    {
        return $this->id_film;
    }


    public function getTitre_film()
    {
        return $this->titre_film;
    }


    public function setTitre_film($titre_film)
    {
        $this->titre_film = $titre_film;

        return $this;
    }


    public function getDuree()
    {
        return $this->duree;
    }


    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }


    public function getRealisateur()
    {
        return $this->realisateur;
    }


    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;

        return $this;
    }


    public function getEtoils()
    {
        return $this->etoils;
    }


    public function setEtoils($etoils)
    {
        $this->etoils = $etoils;

        return $this;
    }
  


   
}
