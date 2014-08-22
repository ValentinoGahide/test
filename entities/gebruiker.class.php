<?php

class Gebruiker {

    private static $idMap = array();
    private $id;
    private $naam;
    private $usernaam;
    private $wachtwoord;
    private $adres;
    private $email;
    private $telefoon;
    private $dt_aangemaakt;
    private $postcode_id;
    private $postcode;
    
    

    private function __construct($id, $naam, $usernaam, $wachtwoord, $adres, $email, 
                                 $telefoon, $dt_aangemaakt, $postcode_id, $postcode) {
        $this->id = $id;
        $this->naam = $naam;
        $this->usernm = $usernaam;
        $this->pasw = $wachtwoord;
        $this->adres = $adres;
        $this->email = $email;
        $this->telefoon = $telefoon;
        $this->dt_aangemaakt = $dt_aangemaakt;
        $this->postcode_id = $postcode_id;
        $this->postcode = $postcode;
    }

    public static function create($id, $naam, $usernaam, $wachtwoord, $adres, $email, 
                                 $telefoon, $dt_aangemaakt, $postcode_id, $postcode) 
    {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Gebruiker($id, $naam, $usernaam, $wachtwoord, $adres, $email, 
                                 $telefoon, $dt_aangemaakt, $postcode_id, $postcode);
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

    public function getEmail() {
        return $this->email;
    }

    public function getTelefoon() {
        return $this->telefoon;
    }

    public function getDt_aangemaakt() {
        return $this->dt_aangemaakt;
    }

    public function getPostcode_id() {
        return $this->postcode_id;
    }

    public function getPostcode() {
        return $this->postcode;
    }
    
    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function setUsernm($usernaam) {
        $this->usernaam = $usernaam;
    }

    public function setPasw($wachtwoord) {
        $this->wachtwoord = $wachtwoord;
    }

    public function setAdres($adres) {
        $this->adres = $adres;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelefoon($telefoon) {
        $this->telefoon = $telefoon;
    }

    public function setDt_aangemaakt($dt_aangemaakt) {
        $this->dt_aangemaakt = $dt_aangemaakt;
    }

    public function setPostcode_id($postcode_id) {
        $this->postcode_id = $postcode_id;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

}
