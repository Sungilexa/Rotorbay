<?php
function Connexion(){
    try
    {
        $mysqlclient = new PDO('mysql:host=192.168.244.148;dbname=EcomDB;charset=utf8', 'admin', 'admin', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    return $mysqlclient;
}
?>

