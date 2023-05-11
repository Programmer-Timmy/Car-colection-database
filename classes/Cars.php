<?php

class cars {

    public static function loadcars($filter = "", $sortby = "Nummer" , $orderby = "ASC")
    {
        $results = database::getRows('autoverzameling' ,['Model', 'Merk', 'Nummer','Producent', 'Modelnr'], 'sssss', ['%' . $filter . '%','%' . $filter . '%','%' . $filter . '%','%' . $filter . '%','%' . $filter . '%'], "JOIN `staat voertuig` ON autoverzameling.staat=`staat voertuig`.id join locatie on autoverzameling.`huidige locatie`=locatie.id", $sortby . " " . $orderby);
        if ($results) {
            return $results;
        } else {
            return false;
        }
    }
}