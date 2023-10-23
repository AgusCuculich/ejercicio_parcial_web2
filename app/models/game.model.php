<?php

require_once '../parcialWebEj2/config.php';

class gameModel {

    private $db;

    function __construct() {
        $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
    }

    public function getGames() {
        $query = $this->db->prepare('SELECT * FROM juego');
        $query->execute();
        $games = $query->fetchAll(PDO::FETCH_OBJ);
        return $games;
    }

    public function deleteGame($id) {
        $query = $this->db->prepare('DELETE FROM juego WHERE id = ?');
        $query->execute([$id]);
    }

    public function addGame($name, $cant_jugadores, $cardGame) {
        $query = $this->db->prepare('INSERT INTO juego (id, nombre, cant_jugadores, juego_de_cartas) 
        VALUES (?, ?, ?, ?)');

        $id = $this->db->lastInsertId();

        $query->execute([$id, $name, $cant_jugadores, $cardGame]);
    }

}