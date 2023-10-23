<?php

include_once 'app/controllers/game.controller.php';
include_once 'app/controllers/gamble.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch($params[0]) {
    case 'home':
        $controller = new gameController();
        $controller->showGames();
        break;
    case 'agregar':
        $controller = new gameController();
        $controller->showNewGameForm();
        break;
    case 'process_form':
        $controller = new gameController();
        $controller->addGame();
        break;
    case 'eliminar':
        if (isset($params[1])) {
            $controller = new gameController();
            $controller->deleteGame($params[1]);
        }
        break;
    case 'apuesta':
        $controller = new gambleController();
        $controller->newGambleForm();
        break;
    case 'process_gamble':
        $controller = new gambleController();
        $controller->addGamble();
        break;
    case 'mostrar_apuestas':
        $controller = new gambleController();
        $controller->showGambles();
        break;
}