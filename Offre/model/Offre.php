<?php
class Offre
{
    private ?int $IdO = null;
    private ?string $FilmPropose = null;
    private ?string $Duree = null;
    private ?string $TypeP = null;

    public function _construct($IdO = null, $FilmPropose , $Duree, $TypeP)
    {
        $this->IdO = $IdO;
        $this->FilmPropose = $FilmPropose;
        $this->Duree = $Duree;
        $this->TypeP = $TypeP;
    }


    public function getIdO()
    {
        return $this->IdO;
    }

    public function setIdO($IdO)
    {
        $this->IdO= $IdO;

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

    public function getTypeP()
    {
        return $this->TypeP;
    }

    public function setTypeP($TypeP)
    {
        $this->TypeP = $TypeP;

        return $this;
    }


}
