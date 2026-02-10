<?php
require_once 'modeles/User.php';

class UserController {
    public function showRegistrationForm() {
        require_once 'vues/register.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            if ($user->create($username, $password)) {
                header('Location: index.php?controller=user&action=showLoginForm');
            } else {
                echo "Erreur lors de l'inscription.";
            }
        }
    }

    public function showLoginForm() {
        require_once 'vues/login.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                header('Location: index.php');
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
    }

    public function addPokemon() {
        if (!isset($_SESSION['username'])) {
            header('Location: index.php?controller=user&action=showLoginForm');
            return;
        }

        $pokemonId = $_GET['id'];
        $username = $_SESSION['username'];

        $userModel = new User();
        $userId = $userModel->getUserIdByUsername($username);

        if ($userId && $userModel->addPokemon($userId, $pokemonId)) {
            header('Location: index.php?controller=pokemon&action=showAllPokemon');
        } else {
            echo "Erreur lors de l'ajout du Pokémon.";
        }
    }

    public function showMyPokemon() {
        if (!isset($_SESSION['username'])) {
            header('Location: index.php?controller=user&action=showLoginForm');
            return;
        }

        $username = $_SESSION['username'];
        $userModel = new User();
        $userId = $userModel->getUserIdByUsername($username);

        if ($userId) {
            $pokemonIds = $userModel->getPokemons($userId);
            
            require_once 'modeles/Pokemon.php';
            $pokemonModel = new Pokemon();
            $allPokemons = $pokemonModel->getAllPokemons();

            $myPokemons = [];
            foreach ($allPokemons as $pokemon) {
                if (in_array($pokemon['id'], $pokemonIds)) {
                    $myPokemons[] = $pokemon;
                }
            }

            require_once 'vues/my_pokemon.php';
        } else {
            echo "Utilisateur non trouvé.";
        }
    }
}
