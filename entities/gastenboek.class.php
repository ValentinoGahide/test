<?php

class Gastenboek {

    private static $idMap = array();
    private $id;
    private $usernaam;
    private $boodschap;
    private $dt_aangemaakt;

    private function __construct($id, $usernaam, $boodschap, $dt_aangemaakt) {
        $this->id = $id;
        $this->usernaamm = $usernaam;
        $this->boodschap = $boodschap;
        $this->dt_aangemaakt = $dt_aangemaakt;
    }

    public static function create($id, $usernaam, $boodschap, $dt_aangemaakt) 
    {
        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new Gastenboek($id, $usernaam, $boodschap, $dt_aangemaakt);
        }
        return self::$idMap[$id];
    }

    public function getId() {
        return $this->id;
    }

    public function getUsernaam() {
        return $this->usernaam;
    }

    public function getBoodschap() {
        return $this->boodschap;
    }

    public function getDt_aangemaakt() {
        return $this->dt_aangemaakt;
    }

    public function setUsernm($usernaam) {
        $this->usernaamm = $usernaam;
    }

    public function setBoodschap($boodschap) {
        $this->boodschap = $boodschap;
    }

    public function setDt_aangemaakt($dt_aangemaakt) {
        $this->dt_aangemaakt = $dt_aangemaakt;
    }

    
}
