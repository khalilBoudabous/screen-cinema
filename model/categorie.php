<?php
class categorie
{
    private ?int $id_ca = null;
    private ?string $type_c = null;
    public function __construct($id_ca, $type_c)
    {
        $this->id_ca = $id_ca;
        $this->type_c = $type_c;
    }


    public function getId_ca()
    {
        return $this->id_ca;
    }
    public function setId_ca($id_ca)
    {
        return $this->id_ca;
    }


    public function getType_c()
    {
        return $this->type_c;
    }


    public function setType_c($type_c)
    {
        $this->type_c = $type_c;

        return $this;
    }

}
