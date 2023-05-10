<?php

class cars {

    public static function loadcars()
    {
        $results = database::getRows('autoverzameling' ,false, false, false, "Nummer" );
        if ($results) {
            return $results;
        } else {
            return false;
        }
    }
}