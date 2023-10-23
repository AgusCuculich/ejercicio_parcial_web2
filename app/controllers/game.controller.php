<?php

require_once 'app/models/game.model.php';
require_once 'app/views/game.view.php';

class gameController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new gameModel();
        $this->view = new gameView();
    }

    public function showGames() {
        $games = $this->model->getGames();
        $this->view->showGames($games);
    }

    public function deleteGame($id) {
        $this->model->deleteGame($id);
        header('Location: ' . BASE_URL);
    }

    public function showNewGameForm() {
        $this->view->showNewGameForm();
    }

    public function addGame() {

        $name = $_POST['name'];
        $cant_jugadores = $_POST['cant_jugadores'];
        $cardGame = $_POST['cardGame'];

        $cardGame = $cardGame ? 1 : 0;

        if (empty($name) || empty($cant_jugadores) || empty($cardGame)) {
            $this->view->showNewGameForm("Verifique que todos los campos esten completos");
            var_dump($cardGame);
            return;
        }

        $this->model->addGame($name, $cant_jugadores, $cardGame);

        header('Location: ' . BASE_URL);
    }
}