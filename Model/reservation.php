<?php
        class reservation {
          private ?string $id_r = null;
          private ?string $horraires = null;
          private ?string $date = null;
          private ?int $quantite = null;
          private ?string $id_t = null;
          private ?string $methode_p = null;
        
          public function __construct($id_r = null, $horraires, $date, $quantite, $id_t, $methode_p) {
            $this->id_r = $id_r;
            $this->horraires = $horraires;
            $this->date = $date;
            $this->quantite = $quantite;
            $this->id_t = $id_t;
            $this->methode_p = $methode_p;
          }
        
          public function getid_r() {
            return $this->id_r;
          }
        
          public function sethorraires($horraires) {
            $this->horraires = $horraires;
          }
        
          public function gethorraires() {
            return $this->horraires;
          }
        
          public function setdate($date) {
            $this->date = $date;
          }
        
          public function getdate() {
            return $this->date;
          }
        
          public function setquantite($quantite) {
            $this->quantite = $quantite;
          }
        
          public function getquantite() {
            return $this->quantite;
          }
        
          public function setid_t($id_t) {
            $this->id_t = $id_t;
          }
        
          public function getid_t() {
            return $this->id_t;
          }
        
          public function setmethode_p($methode_p) {
            $this->methode_p = $methode_p;
          }
        
          public function getmethode_p() {
            return $this->methode_p;
          }
        }
        
        ?>
