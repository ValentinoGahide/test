<?php

require_once("data/dbconfig.class.php");
require_once("data/postcodeDAO.class.php");
require_once("entities/gebruiker.class.php");
require_once("entities/postcode.class.php");
require_once("exceptions/gebrexception.class.php");

class GebruikerDAO {

    public static function getAll() {
        $lijst = array();
        $core = DBConfig::getInstance();
        $sql = "select gebruiker.id as gebr_id, naam, wachtwoord, usernaam, 
                       adres, email, telefoon, postcode_id, promotie, dt_aangemaakt, opm_extra,
                       postcode.gemeente as gemeente, postnr, kostprijs, thuis_lev_ok
                from gebruiker,  postcode 
                where postcode_id =  postcode.id";
        $resultSet = $core->dbh->query($sql);
        foreach ($resultSet as $rij) {
            $postcode = Postcode::create($rij["postcode_id"], $rij["postnr"], $rij["gemeente"], $rij["kostprijs"], $rij["thuis_lev_ok"]);
            $gebruiker = Gebruiker::create($rij["gebr_id"], $rij["naam"], $rij["usernaam"], $rij["wachtwoord"], $rij["adres"], $rij["email"], $rij["telefoon"], $rij["dt_aangemaakt"], $rij["postcode_id"], $rij["promotie"], $rij["btwnr"], $rij["opm_extra"], $postcode);
            array_push($lijst, $gebruiker);
        }
        return $lijst;
    }

    public static function getById($id) {
        $core = DBConfig::getInstance();
        $sql = "select gebruiker.id as gebr_id, naam, wachtwoord, usernaam, 
                       adres, email, telefoon, postcode_id, promotie, dt_aangemaakt, opm_extra,
                       postcode.gemeente as gemeente, postnr, kostprijs, thuis_lev_ok
                from gebruiker,  postcode 
                and gebruiker.id = " . $id;
        $resultSet = $core->dbh->query($sql);
        $rij = $resultSet->fetch();
        $postcode = Postcode::create($rij["postcode_id"], $rij["postnr"], $rij["gemeente"], $rij["kostprijs"], $rij["thuis_lev_ok"]);
        $gebruiker = Gebruiker::create($rij["gebr_id"], $rij["naam"], $rij["usernaam"], $rij["wachtwoord"], $rij["adres"], $rij["email"], $rij["telefoon"], $rij["dt_aangemaakt"], $rij["postcode_id"], $rij["promotie"], $rij["btwnr"], $rij["opm_extra"], $postcode);
        return $gebruiker;
    }

    public static function getByNaam($naam) {
        $core = DBConfig::getInstance();
        $sql = "select gebruiker.id as gebr_id, naam, wachtwoord, usernaam, 
                       adres, email, telefoon, postcode_id, promotie, dt_aangemaakt, opm_extra,
                       postcode.gemeente as gemeente, postnr, kostprijs, thuis_lev_ok
                from gebruiker,  postcode 
                where postcode_id =  postcode.id
                and gebruiker.naam = " . "'" . $naam . "'";
        $resultSet = $core->dbh->query($sql);
        $rij = $resultSet->fetch();
        if ($rij) {
            $postcode = Postcode::create($rij["postcode_id"], $rij["postnr"], $rij["gemeente"], $rij["kostprijs"], $rij["thuis_lev_ok"]);
            $gebruiker = Gebruiker::create($rij["gebr_id"], $rij["naam"], $rij["usernaam"], $rij["wachtwoord"], $rij["adres"], $rij["email"], $rij["telefoon"], $rij["dt_aangemaakt"], $rij["postcode_id"], $rij["promotie"], $rij["btwnr"], $rij["opm_extra"], $postcode);
        } else {
            $gebruiker = null;
        }
        return $gebruiker;
    }

    public static function getByUsernm($usernaam) {
        $core = DBConfig::getInstance();
        $sql = "select gebruiker.id as gebr_id, naam, wachtwoord, usernaam, 
                       adres, email, telefoon, postcode_id, promotie, dt_aangemaakt, opm_extra,
                       postcode.gemeente as gemeente, postnr, kostprijs, thuis_lev_ok
                from gebruiker,  postcode 
                where postcode_id =  postcode.id
                and gebruiker.usernaam = " . "'" . $usernaam . "'";
        $resultSet = $core->dbh->query($sql);
        $rij = $resultSet->fetch();
        if ($rij) {
            $postcode = Postcode::create($rij["postcode_id"], $rij["postnr"], $rij["gemeente"], $rij["kostprijs"], $rij["thuis_lev_ok"]);
            $gebruiker = Gebruiker::create($rij["gebr_id"], $rij["naam"], $rij["usernaam"], $rij["wachtwoord"], $rij["adres"], $rij["email"], $rij["telefoon"], $rij["dt_aangemaakt"], $rij["postcode_id"], $rij["promotie"], $rij["btwnr"], $rij["opm_extra"], $postcode);
        } else {
            $gebruiker = null;
        }
        return $gebruiker;
    }

    //Bestaat_Nieuwe_Gebr_al ? 
    public static function Bestaat_Nieuwe_Gebr_al($usernaam) {
        $core = DBConfig::getInstance();
        $sql = "select gebruiker.id as gebr_id, naam, wachtwoord, usernaam, 
                       adres, email, telefoon, postcode_id, promotie, dt_aangemaakt, opm_extra,
                       postcode.gemeente as gemeente, postnr, kostprijs, thuis_lev_ok
                from gebruiker,  postcode 
                where postcode_id =  postcode.id
                and gebruiker.usernaam = " . "'" . $usernaam . "'";
        $resultSet = $core->dbh->query($sql);
        $rij = $resultSet->fetch();
        if ($rij) {
            $gebruiker_bestaat_al = TRUE;
            throw new GebrBestaatException();
        } else {
            $gebruiker_bestaat_al = FALSE;
        }
        return $gebruiker_bestaat_al;
    }

    public static function Bestaat_Gebr_Pasw($usernaam, $wachtwoord) {
        $core = DBConfig::getInstance();
           $sql = "select gebruiker.id as gebr_id, naam, wachtwoord, usernaam, 
                       adres, email, telefoon, postcode_id, promotie, dt_aangemaakt, opm_extra,
                       postcode.gemeente as gemeente, postnr, kostprijs, thuis_lev_ok
                from gebruiker,  postcode 
                where postcode_id =  postcode.id
                and gebruiker.usernaam = " . "'" . $usernaam . "'" . "
                and gebruiker.wachtwoord = " . "'" . $wachtwoord . "'";
        $resultSet = $core->dbh->query($sql);
        $rij = $resultSet->fetch();
        if ($rij) {
            $gebr_pasw_bestaat_niet = FALSE;
        } else {
            $gebr_pasw_bestaat_niet = TRUE;
            throw new GebrPaswBestaatNietException();
        }
        return $gebr_pasw_bestaat_niet;
    }

    public static function Create($id, $naam, $usernaam, $wachtwoord, $adres, $postcode, $postcode_id, $email, $telefoon, $promotie, $dt_aangemaakt, $opm_extra) {
        $bestaandeGebr = self::getByNaam($naam);
        if (isset($bestaandeGebr))
            throw new GebrBestaatException();
        $core = DBConfig::getInstance();
        $sql = "insert into gebruiker (naam, usernaam, wachtwoord, adres, postcode, postcode_id, 
                email, telefoon, promotie, dt_aangemaakt, opm_extra) 
                values ('" . $naam . "', " . "'" . $usernaam
                . "', " . "'" . $wachtwoord . "', "
                . "'" . $adres . "', " .
                "'" . $postcode . "', " . "'" . $postcode_id . "', " . "'" . $email .
                "', " . "'" . $telefoon . "', " .
                "'" . $promotie . "', " . "'" . $dt_aangemaakt . "', " . "'" . $opm_extra ."'" .")";
        $core->dbh->exec($sql);
        $id = $core->dbh->lastInsertId();
        $postcode = PostcodeDAO::getById($postcode_id);
        $gebruiker = Gebruiker::create($id, $naam, $usernaam, $wachtwoord, $adres, $postcode, $postcode_id, $email, $telefoon, $promotie, $dt_aangemaakt, $opm_extra);
        return $gebruiker;
    }

    public static function Delete($id) {
        $core = DBConfig::getInstance();
        $sql = "delete from gebruiker where id = " . $id;
        $core->dbh->exec($sql);
    }

    public static function update($gebruiker) {
        $sql = "update gebruiker set naam='" . $gebruiker->getNaam() .
                ", adres=" . "'" . $gebruiker->getAdres() .
                "', postcode=" . $gebruiker->getPostcode() .
                "', postcode_id=" . $gebruiker->getPostcode_id() .
                "', email=" . "'" . $gebruiker->getEmail() .
                "', telefoon=" . "'" . $gebruiker->getTelefoon() .
                ", promotie=" . $gebruiker->getPromotie() .
                ", opm_extra=" . "'" . $gebruiker->getOpm_extra() .
                " where id = " . $gebruiker->getId();
        //
        // Errorchecking before the update
        //
        if ($gebruiker->getLevel_auth() < 0 or $gebruiker->getLevel_auth() > 1)
            throw new GebrLevel_Auth_WrongException();
        if (!is_numeric($gebruiker->getLevel_auth()))
            throw new GebrLevel_Auth_WrongException();
        //
        if ($gebruiker->getActief() < 0 or $gebruiker->getActief() > 1)
            throw new GebrActief_WrongException();
        if (!is_numeric($gebruiker->getActief()))
            throw new GebrActief_WrongException();
        //
        if ($gebruiker->getKorting() < -50 or $gebruiker->getKorting() > 100)
            throw new GebrKorting_WrongException();
        if (!is_numeric($gebruiker->getKorting()))
            throw new GebrKorting_WrongException();
        //
        $core = DBConfig::getInstance();
        $core->dbh->exec($sql);
    }

}

?>