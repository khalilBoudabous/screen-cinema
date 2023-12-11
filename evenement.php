<?php

class evenement
{

    public $id_ev;
    public $name;

    public $duree;
    public $placement;
    public $date;
    function __construct($id_ev, $name, $placement, $duree, $date)
    {
        $this->id_ev = $id_ev;
        $this->name = $name;
        $this->placement = $placement;
        $this->duree = $duree;
        $this->date = $date;
    }

    function getid_ev()
    {
        return $this->id_ev;
    }
    function getname()
    {
        return $this->name;
    }
    function setname($name)
    {
        $this->name = $name;
    }
    function getduree()
    {
        return    $this->duree;
    }
    function setduree($duree)
    {
        $this->duree = $duree;
    }
    function getplacement()
    {
        return    $this->placement;
    }
    function setplacement($placement)
    {
        $this->placement = $placement;
    }
    function getdate()
    {
        return    $this->date;
    }
    function setdate($date)
    {
        $this->date = $date;
    }
}
