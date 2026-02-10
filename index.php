<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'main';
$action = isset($_GET['action']) ? $_GET['action'] : 'home';

switch ($controller) {
    case 'user':
        require_once 'controleurs/UserController.php';
        $userController = new UserController();
        switch ($action) {
            case 'showRegistrationForm':
                $userController->showRegistrationForm();
                break;
            case 'register':
                $userController->register();
                break;
            case 'showLoginForm':
                $userController->showLoginForm();
                break;
            case 'login':
                $userController->login();
                break;
            case 'logout':
                $userController->logout();
                break;
            case 'addPokemon':
                $userController->addPokemon();
                break;
            case 'showMyPokemon':
                $userController->showMyPokemon();
                break;
            default:
                // Page not found
                break;
        }
        break;
    case 'pokemon':
        require_once 'controleurs/PokemonController.php';
        $pokemonController = new PokemonController();
        switch ($action) {
            case 'showAllPokemon':
                $pokemonController->showAllPokemon();
                break;
            case 'showOnePokemon':
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                $pokemonController->showOnePokemon($id);
                break;
            default:
                // Page not found
                break;
        }
        break;
    case 'main':
        require_once 'controleurs/MainController.php';
        $mainController = new MainController();
        switch ($action) {
            case 'home':
                $mainController->home();
                break;
            default:
                // Page not found
                break;
        }
        break;
    default:
        // Page not found
        break;
}
