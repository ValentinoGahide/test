<?php

require_once("data/gebruikerdao.class.php");

class GebruikerinfoService {
    
    public static function toonGebruikers() {
        $lijst_gebr = GebruikerDAO::getAll();
        return $lijst_gebr;
    }

    public static function voegNieuweGebrToe($naam, $usernaam, $wachtwoord, $adres, $postcode, $postcode_id, $email, $telefoon, $promotie, $dt_aangemaakt, $opm_extra) 
    {
        $lijst_gebr = GebruikerDAO::Create($naam, $usernaam, $wachtwoord, $adres, $postcode, $postcode_id, $email, $telefoon, $promotie, $dt_aangemaakt, $opm_extra);
    }

    public static function Bestaat_Nieuwe_Gebr_al($usernaam) 
    {
        $lijst_gebr = GebruikerDAO::Bestaat_Nieuwe_Gebr_al($usernaam); 
    }

    public static function Bestaat_Gebr_Pasw($usernaam, $wachtwoord) 
    {
        $lijst_gebr = GebruikerDAO::Bestaat_Gebr_Pasw($usernaam, $wachtwoord); 
    }
    
    public static function verwijderGebr($id) {
        GebruikerDAO::Delete($id);
    }
    
    public static function haalGebrOp($id) {
        $gebr = GebruikerDAO::getById($id);
        return $gebr;
    }

    public static function haalGebrOp_Usernm($usernaam) {
        $gebr = GebruikerDAO::getByUsernm($usernaam);
        return $gebr;
    }

    public static function updateGebr($id, $naam, $adres, $postcode_id, $email, $telefoon, $promotie, $dt_aangemaakt, $opm_extra) {
        $gebr = GebruikerDAO::getById($id);
        $gebr->setNaam($naam);
        $gebr->setAdres($adres);
        $gebr->setPostcode_id($postcode_id);
        $gebr->setEmail($email);
        $gebr->setTelefoon($telefoon);
        $gebr->setPromotie($promotie);
        $gebr->setOpm_extra($opm_extra);
        GebruikerDAO::update($gebr);
    }
    
    public static function Thuis_lev_mogelijk ($usernaam) 
    {
        $gebr = GebruikerDAO::getByUsernm($usernaam);
        if (isset ($gebr))
          {return ($gebr->GetPostcode()->getThuis_lev_ok() );}
        else
          {return 0;}
    }

    
    
}
