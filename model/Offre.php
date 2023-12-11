<?php
class Offre
{
    private $IdO;
    private $FilmPropose;
    private $Duree;
    private $montant;

    public function __construct($IdO, $FilmPropose , $Duree,$montant)
    {
        $this->IdO = $IdO;
        $this->FilmPropose = $FilmPropose;
        $this->Duree = $Duree;
        $this->montant=$montant;
        
    }
   


    public function getIdO()
    {
        return $this->IdO;
    }
    public function getFilmPropose()
    {
        return $this->FilmPropose;
    }

    public function setFilmPropose($FilmPropose)
    {
        $this->FilmPropose = $FilmPropose;

        return $this;
    }


    public function getDuree()
    {
        return $this->Duree;
    }

    public function setDuree($Duree)
    {
        $this->Duree = $Duree;

        return $this;
    }
    public function getmontant()
    {
        return $this->montant;
    }

    public function setmontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }
  
  


}
