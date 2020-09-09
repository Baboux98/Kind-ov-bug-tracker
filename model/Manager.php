<?php

class Manager
{
    protected function dbconnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=GesIntervention;charset=utf8', 'Farhane', 'Farhane1998', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));            
        
        return $db;
    }

}
