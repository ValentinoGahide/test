<?php

require_once("data/dbconfig.class.php");
require_once("entities/gastenboek.class.php");

class GastenboekDAO {

    public static function getAll() {
        $lijst = array();
        $core = DBConfig::getInstance();
        $sql = "select id, usernaam, boodschap, dt_aangemaakt
                  from gastenboek 
                 order by dt_aangemaakt desc";
        $resultSet = $core->dbh->query($sql);
        foreach ($resultSet as $rij) {
            $gastenboek = Gastenboek::create($rij["id"], $rij["usernaam"], $rij["boodschap"], $rij["dt_aangemaakt"]);
            array_push($lijst, $gastenboek);
        }
        return $lijst;
    }

    public static function Create($usernaam, $boodschap, $dt_aangemaakt) {
        $core = DBConfig::getInstance();
        $sql = "insert into gastenboek (usernaam, boodschap, dt_aangemaakt) 
                values ('" . $usernaam . "', " . $boodschap . "', " . $dt_aangemaakt .
                ")";

        $core->dbh->exec($sql);
        $Gastb_Id = $core->dbh->lastInsertId();
        $gastenboek = Gebruiker::create($Gastb_Id, $naam, $boodschap, $dt_aangemaakt);
        return $gastenboek;
    }

    public static function Delete($id) {
        $core = DBConfig::getInstance();
        $sql = "delete from gastenboek where id = " . $id;
        $core->dbh->exec($sql);
    }

}

class Bericht {

    public function __construct($id, $auteur, $boodschap, $datum) {
        $this->id = $id;
        $this->auteur = $auteur;
        $this->boodschap = $boodschap;
        $this->datum = $datum;
    }

    public function getId() {
        return $this->id;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function getBoodschap() {
        return $this->boodschap;
    }

    public function getDatum() {
        return $this->datum;
    }

}