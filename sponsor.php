<?php

class sponsor
{

    public $id_sp;
    public $name;
    public $phone;
    public $montant;
    function __construct($id_sp, $name, $phone, $montant)
    {
        $this->id_sp = $id_sp;
        $this->name = $name;
        $this->phone = $phone;
        $this->montant = $montant;
    }

    function getid_sp()
    {
        return $this->id_sp;
    }
    function getname()
    {
        return $this->name;
    }
    function setname($name)
    {
        $this->name = $name;
    }
    function getphone()
    {
        return    $this->phone;
    }
    function setphone($phone)
    {
        $this->phone = $phone;
    }
    function getmontant()
    {
        return    $this->montant;
    }
    function setmontant($montant)
    {
        $this->montant = $montant;
    }
}
