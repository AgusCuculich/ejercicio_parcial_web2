<?php

require_once './app/models/gamble.model.php';
require_once './app/views/gamble.view.php';
require_once './app/models/game.model.php';

class gambleController {

    private $gambleModel;
    private $gameModel;
    private $view;

    function __construct() {
        $this->gambleModel = new gambleModel();
        $this->gameModel = new gameModel();
        $this->view = new gambleView();
    }

    public function newGambleForm() {
        $games = $this->gameModel->getGames();
        $this->view->newGambleForm($games, null);
    }

    public function addGamble() {
        $games = $this->gameModel->getGames();

        $date = $_POST['date'];
        $amount = $_POST['amount'];
        $id_game = $_POST['id_game'];

        if (empty($date) || empty($amount) || empty($id_game)) {
            $this->view->newGambleForm($games, "Verifique que todos los datos esten completos");
        }

        $this->gambleModel->addGamble($date, $amount, $id_game);

        header('Location: ' . BASE_URL);
    }


    public function showGambles() {
        $gambles = $this->gambleModel->getGambles();

        foreach ($gambles as $gamble) {
            $gameName = $this->gameModel->getName($gamble->id_juego);
            
        }

        $this->view->showGambles($gambles);
    }
}