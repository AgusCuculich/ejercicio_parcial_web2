<?php

class gambleModel {

    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }

    public function addGamble($date, $amount, $id_game) {
        $query = $this->db->prepare('INSERT INTO apuesta (id, fecha, monto, id_juego) VALUES (?, ?, ?, ?)');
        $id = $this->db->lastInsertId();
        $query->execute([$id, $date, $amount, $id_game]);
    }

    public function getGambles() {
        $query = $this->db->prepare('SELECT * FROM apuesta');
        $query->execute();
        $gambles = $query->fetchAll(PDO::FETCH_OBJ);
        return $gambles;
    }

    public function getName() {
        $query = $this->db->prepare('SELECT * FROM apuesta INNER JOIN juego ON apuesta.id_juego = juego.id');
        $query->execute();
    
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    
}