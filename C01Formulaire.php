<?php
include_once "./C00Database.php";
include_once "./C02User.php";

/*
 * LES FORMULAIRES
 */


class Formulaires {
    private $data;
    
    public function __construct() {
        //On crée une instance de la class Database associé a data.
        //donc data est devenus database.
        $this->data = new Database();
    }
    
    //FORMULAIRE D'INSCRIPTION UTILISATEUR.
    function formulaire() {
        echo "
    //Formulaire d'inscription
    <main>
        <section>
            <div class='FormulaireInscription'>
                <form method='POST'>
                    <fieldset>
                    <label for='name'>Username</label>
                    <input type='text' id='name' name='pseudo'> 
                    <label for='mdp'>Password</label>
                    <input type='password' id='mdp' name='mdp'>
                    <input type='submit' name='action' value='inscription'>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
        ";
    }
    
    function traitementFormulaire($post) {
        //verifie les champs.
        if (isset($post["pseudo"]) && isset($post["mdp"])) {
            //on crée une instance de la class users
            $user = new User($post["pseudo"], md5($post["mdp"]));
            //Vus que data est database on lui dit d'allez recuperer la function qui
            //permet de crée un utilisateur.
            if($this->data->createUser($user)) {
                echo "Bravo vous êtes bien inscrit";
            }
        }
    }

    function redirection() {
        //A L'inscription de la page retourner sur la page d'index.
        //header("location: index.php");
        //Ajouter un boutton au cas bug.
        echo "<p>";
        echo "<a href='../index.php' title='Revenir sur la page d'\accueil'>" . "Revenir à la page d'accueil " . "</a>";
        echo "</p>";
        echo "<p>";
        echo "<a href='inscription.html' title='Crée un compte'>" . "Crée un second compte " . "</a>";
        echo "</p>";
        echo "Si aucun choix vous serez redirigez dans 10 seconde vers la page d'accueil";
        //redirection Dans 10 seconde vers index.php.
        header("refresh:10;url=../index.php");
    }
    
    //AUTHENTIFICATION.
    function authentification() {
        echo "
    //Formulaire d'identification
    <main>
        <section>
            <div class='FormulaireInscription'>
                <form method='POST'>
                    <fieldset>
                    <label for='name'>Connecter vous</label>
                    <input type='text' id='name' name='pseudo'> 
                    <label for='mdp'>Password</label>
                    <input type='password' id='mdp' name='mdp'>
                    <input type='submit' name='action' value='Se connecter'>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
        ";
    }
    
    function traitementAuthentification($post) {
        //verifie les champs.
        if (isset($post["pseudo"]) && isset($post["mdp"])) {
            //on crée une instance de la class users
            $user = new User($post["pseudo"], md5($post["mdp"]));
            //Vus que data est database on lui dit d'allez recuperer la function qui
            //permet de crée un utilisateur.
            if($this->data->createUser($user)) {
                echo "Bravo vous êtes bien inscrit";
            }
        }
    }
    
    //FORMULAIRE AJOUTER DES RECETTES.
    function creeRecettes() {
        echo "
            <fieldset>
            <form method='POST'>
            <p>
            <label for='title'>Ajouter un nom à votre recette</label>
            <input type='text' id='title' name='title'>
            </p>
            <p>
            <label for='ingredient'>Inscrivez votre liste d'ingredient</label>
            <textarea type='text' id='ingredient' name='ingredient' cols='10' rows='10'>
            </p>
            <p>
            <label for='price'>Estimation du prix</label>
            <input type='number' id='price' name='price'>
            </p>
            </form>
            </fieldset>
        ";
    }
}
