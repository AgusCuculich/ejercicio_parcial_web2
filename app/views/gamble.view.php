<?php

class gambleView {

    public function newGambleForm($games, $error) {
        require './templates/gambleForm.phtml';
    }

    public function showGambles($gambles) {
        require './templates/gambles.phtml';
    }
}