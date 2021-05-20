<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);

    $user = $pdo->getInfosUser($login, $mdp);

    if (!is_array($user)) {
        ajouterErreur('Login ou mot de passe incorrect');

        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    } else {

        $id = $user['id'];
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $idTypeUser = $user['idtypeuser'];

        connecter($id, $nom, $prenom, $idTypeUser); //enregistre l'utilisateur dans la session

        if (headers_sent()) {
            die("Redirection échouée: <a href=\"\index.php\">Cliquer ici</a>");
        }
        else{
            exit(header('Location: index.php'));
        }
    }
    break;
default:
    include 'vues/v_connexion.php';
    break;
}
