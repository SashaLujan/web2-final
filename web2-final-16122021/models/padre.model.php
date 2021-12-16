<?php

class PadreModel {
    public $db;

    public function __constructor(){
        $this->db = $this->createConection();
    }

    public function createConection(){
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = '';
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
            //este cambio de errores se hace sólo en modo de desarrollo
         //   $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        } catch (Exception  $e) {
            var_dump($e);
        }
        return $pdo;
    }
}