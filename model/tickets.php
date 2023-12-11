<?php
class Tickets {
  private ?string $id_t = null;
  private ?int $prix = null;
  private ?string $id_film = null;


  public function __construct($id_t = null, $prix, $id_film) {
    $this->id_t = $id_t;
    $this->prix = $prix;
    $this->id_film = $id_film;

  }

  public function getid_t() {
    return $this->id_t;
  }

  public function setprix($prix) {
    $this->prix = $prix;
  }

  public function getprix() {
    return $this->prix;
  }

  public function setid_film($id_film) {
    $this->id_film = $id_film;
  }

  public function getid_film() {
    return $this->id_film;
  }

}

?>
