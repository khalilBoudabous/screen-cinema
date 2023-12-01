<?php
class Produit
{
    private ?int $IdP = null;
    private ?string $NomP = null;
    private ?string $Prix = null;
    
    public function _construct($IdP= null, $NomP, $Prix)
    {
        $this->IdP = $IdP;
        $this->NomP = $NomP;
        $this->Prix= $Prix;
    }


    public function getIdP()
    {
        return $this->IdP;
    }

    
    public function setIdP($IdP)
    {
        $this->IdP = $IdP;

        return $this;
    }

    public function getNomP()
    {
        return $this->NomP;
    }

    
    public function setNomP($NomP)
    {
        $this->NomP = $NomP;

        return $this;
    }

    public function getPrix()
    {
        return $this->Prix;
    }

    public function setPrix($Prix)
    {
        $this->Prix = $Prix;

        return $this;
    }

}
