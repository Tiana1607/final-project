<?php 
    require 'connexion.php';

    /* Inscription et connexion */
function inscription($email, $nom, $date_de_naissance, $mdp)
{
    $connexion = connection();

    $requete = "INSERT INTO UTILISATEUR (Email, Nom, Date_naissance, Mot_de_passe) VALUES ('%s', '%s', '%s', '%s')";
    $final = sprintf($requete, $email, $nom, $date_de_naissance, $mdp);
    $insertion = mysqli_query($connexion, $final);
    header('Location: ../index.php');
}

function login($email, $mdp)
{
    $connexion = connection();

    $requete = "SELECT * FROM Membre WHERE email = '%s' AND mot_de_passe = '%s'";
    $final = sprintf($requete, $email, $mdp);
    $result = mysqli_query($connexion, $final);
    $data = mysqli_fetch_assoc($result);
    if ($data) {
        unset($data['Mot_de_passe']);
        $_SESSION['user'] = $data;
        header('Location: ./pages/accueil.php');
        exit();
    } else {
        $_SESSION['error'] = "Email ou mot de passe incorrect !";
    }
}

function list_object()
{
    $connexion = connection();

    $sql = "SELECT * FROM Objet";

    $trait = mysqli_query($connexion, $sql);

    $liste = array();

    while( $result = mysqli_fetch_assoc($trait))
    {
        $liste[] = $result;
    }

    mysqli_free_result($trait);
    deconnection($connexion);
    return $liste;
} 

function objet_emprunter(){
    $connexion = connection();

    $sql= "SELECT o.*, e.id_objet AS emp FROM Objet o
    JOIN emprunt e ON e.id_objet = o.id_objet";

    $resultat= mysqli_query($connexion , $sql);
    
    $liste = array();

    while( $result = mysqli_fetch_assoc($resultat))
    {
        $liste[] = $result;
    }

    mysqli_free_result($resultat);
    deconnection($connexion);
    return $liste;
}

?>