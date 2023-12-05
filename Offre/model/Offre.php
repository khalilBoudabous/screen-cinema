<?php
class Offre
{
    private $IdO;
    private $FilmPropose;
    private $Duree;
   
    public function __construct($IdO, $FilmPropose , $Duree)
    {
        $this->IdO = $IdO;
        $this->FilmPropose = $FilmPropose;
        $this->Duree = $Duree;
        
    }


    public function getIdO()
    {
        return $this->IdO;
    }

    public function setIdO($IdO)
    {
        $this->IdO = $IdO;
        return $this;
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

   


}
