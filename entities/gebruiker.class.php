<?php

class Gebruiker {

    private static $idMap = array();
    private $id;
    private $naam;
    private $usernaam;
    private $wachtwoord;
    private $adres;
    private $postcode;
    private $postcode_id;
    private $email;
    private $telefoon;
    private $promotie;
    private $dt_aangemaakt;
    private $opm_extra;

    private function __construct($id, $naam, $usernaam, $wachtwoord, $adres, $postcode, $postcode_id, $email, $telefoon, $promotie, $dt_aangemaakt, $opm_extra) {
        $this->id = $id;
        $this->naam = $naam;
        $this->usernm = $usernaam;
        $this->pasw = $wachtwoord;
        $this->straat = $adres;
        $this->postcode = $postcode;
        $this->postcode_id = $postcode_id;
        $this->email = $email;
        $this->telefoon = $telefoon;
        $this->promotie = $promotie;
        $this->dt_aangemaakt = $dt_aangemaakt;
        $this->opm_extra = $opm_extra;
    }

    public static function create($id, $naam, $usernaam, $wachtwoord, $adres, $postcode, $postcode_id, $email, $telefoon, $promotie, $dt_aangemaakt, $opm_extra) {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Gebruiker($id, $naam, $usernaam, $wachtwoord, $adres, $postcode, $postcode_id, $email, $telefoon, $promotie, $dt_aangemaakt, $opm_extra);
        }
        return self::$idMap[$id];
    }

    public function getId() {
        return $this->id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function getUsernaam() {
        return $this->usernaam;
    }

    public function getWachtwoord() {
        return $this->wachtwoord;
    }

    public function getAdres() {
        return $this->adres;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getPostcode_id() {
        return $this->postcode_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefoon() {
        return $this->telefoon;
    }

    public function getPromotie() {
        return $this->promotie;
    }

    public function getDt_aangemaakt() {
        return $this->dt_aangemaakt;
    }

    public function getOpm_extra() {
        return $this->opm_extra;
    }

    public function setId() {
        return $this->id;
    }

    public function setNaam() {
        return $this->naam;
    }

    public function setUsernaam() {
        return $this->usernaam;
    }

    public function setWachtwoord() {
        return $this->wachtwoord;
    }

    public function setAdres() {
        return $this->adres;
    }

    public function setPostcode() {
        return $this->postcode;
    }

    public function setPostcode_id() {
        return $this->postcode_id;
    }

    public function setEmail() {
        return $this->email;
    }

    public function setTelefoon() {
        return $this->telefoon;
    }

    public function setPromotie() {
        return $this->promotie;
    }

    public function setDt_aangemaakt() {
        return $this->dt_aangemaakt;
    }

    public function setOpm_extra() {
        return $this->opm_extra;
    }

}
