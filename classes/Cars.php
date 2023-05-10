<?php

class cars {

    public static function loadcars($filter = "")
    {
        $results = database::getRows('autoverzameling' ,['Model', 'Merk', 'Nummer','Producent', 'Modelnr'], 'sssss', ['%' . $filter . '%','%' . $filter . '%','%' . $filter . '%','%' . $filter . '%','%' . $filter . '%'], "JOIN `staat voertuig` ON autoverzameling.staat=`staat voertuig`.id join locatie on autoverzameling.`huidige locatie`=locatie.id", 'Nummer');
        if ($results) {
            return $results;
        } else {
            return false;
        }
    }
}