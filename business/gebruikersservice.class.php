<?php

require_once("data/gebruikerdao.class.php");

class GebruikerinfoService {
    
    public static function toonGebruikers() {
        $lijst_gebr = GebruikerDAO::getAll();
        return $lijst_gebr;
    }

    public static function voegNieuweGebrToe($naam, $usernaam, $wachtwoord, $level_auth, $adres, 
                                             $email, $telefoon, $actief, 
                                             $dt_aangemaakt, $postcode_id, $korting, 
                                             $opm_extra, $btwnr) 
    {
        $lijst_gebr = GebruikerDAO::Create($naam, $usernaam, $wachtwoord, $level_auth, $adres, 
                                           $email, $telefoon, $actief, 
                                           $dt_aangemaakt, $postcode_id, $korting, 
                                           $opm_extra, $btwnr);
    }

    public static function Bestaat_Nieuwe_Gebr_al($usernaam) 
    {
        $lijst_gebr = GebruikerDAO::Bestaat_Nieuwe_Gebr_al($usernaam); 
    }

    public static function Bestaat_Gebr_Pasw($usernaam, $wachtwoord) 
    {
        $lijst_gebr = GebruikerDAO::Bestaat_Gebr_Pasw($usernaam, $wachtwoord); 
    }
    
    public static function Get_Gebr_Actief ($usernaam) 
    {
        $actief = GebruikerDAO::Get_Gebr_Actief($usernaam); 
        return $actief;
    }

    public static function Get_Gebr_Level ($usernaam, $wachtwoord) 
    {
        $level_auth = GebruikerDAO::Get_Gebr_Level($usernaam, $wachtwoord); 
        return $level_auth;
    }

    public static function Get_Gebr_Level_User ($usernaam) 
    {
        $level_auth = GebruikerDAO::Get_Gebr_Level_User($usernaam); 
        return $level_auth;
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

    public static function updateGebr($id, $naam, $level_auth, 
                                      $adres, $email, $telefoon, $actief,
                                      $postcode_id, $korting, $opm_extra) {
        $gebr = GebruikerDAO::getById($id);
        $gebr->setNaam($naam);
        $gebr->setLevel_auth($level_auth);
        $gebr->setAdres($adres);
        $gebr->setEmail($email);
        $gebr->setTelefoon($telefoon);
        $gebr->setActief($actief);
        $gebr->setPostcode_id($postcode_id);
        $gebr->setKorting($korting);
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
