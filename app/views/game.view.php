<?php

class gameView {

    public function showGames($games) {
        require './templates/home.phtml';
    }

    public function showNewGameForm($error = null) {
        require './templates/form.phtml';
    }
}