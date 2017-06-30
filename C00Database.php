
<?php

include_once "./C02User.php";
/*
 * Database contiendra toute les function de creation de lire ou d'authenfication.
 */

/**
 * Description of Database
 *
 * @author solo
 */
class Database {

    //On crée la function crée un utilisateur.
    function createUser(User $user) {
        //Crée un dossier si il n'existe pas.
        if (!is_dir("D01utilisateurs")) {
            mkdir("D01utilisateurs");
        }

        //crée un fichier qui portera pour nom le pseudo en utilisant la class
        //user->getPseudo() va chercher le pseudo que l'on a conserver via le get
        //dans la class User.
        $new_file = fopen("./D01utilisateurs/" . $user->getPseudo() . ".txt", "w");
        //J'écris mon mdp crypter dans le fichier.
        //serialize transforme la donner sous donné binaire pour en faire ce que l'on veut.
        fwrite($new_file, serialize($user));
        //Je referme mon fichier.
        fclose($new_file);
        //Conserver le nom du fichier.
        session_start();
        $_SESSION["pseudo"] = $user;
        return true;
    }

    function authUser($pseudo, $mdp) {
        //Vérification de si l'utilisateur a deja un compte / mot de passe existant qui correspond.
        //Demarrer la session -> (mon pseudo).
        //On vérifie les champs du formulaire que l'on récupere.
        if (isset($_POST["pseudo"]) && isset($_POST["mdp"])) {
            //On securise le champs avec un filtre.
            $id = htmlspecialchars($_POST["pseudo"]);
            $mdp = htmlspecialchars($_POST["mdp"]);


            //On vérifie si le dossier existe avec les fichier utilisateurs a l'endroit cibler.
            $directory = scandir("./D01utilisateurs/");
            foreach ($directory as $file) {
                if ($file == "." || $file == "..") {
                    continue;
                }

                //Recup mot de passe.
                $recupMdp = file_get_contents("./D01utilisateurs/" . $file);
                $recupMdp = unserialize($recupMdp);
                //Supprime les extexion du fichier.
                $file = str_replace(".txt", "", $file);

                //COMPARAISON LOGIN.
                if ($id === $file && md5($mdp) === $recupMdp->mdp) {
                    echo "Vous êtes identifier";
                } else {
                    echo "error";
                    //echo '<script>alert("error");exit();</script>';
                    //header("location: 001index.php");
                }
            }
        }
    }

    function createEvent(Event $event) {
        //Crée un dossier si il n'existe pas.
        if (!is_dir("./D01utilisateur")) {
            mkdir("./D01utilisateur");
        }

        //crée un fichier qui portera pour nom de l'evenement en utilisant la class
        //Utilisateur donc pour utiliser une function on appel $user l'argument
        //puis ->getPseudo(). 
        $new_file = fopen("./D01evenements/" . $event->getEvent() . ".txt", "w");
        //J'écris mon mdp crypter dans le fichier.
        //serialize transforme la donner sous donné binaire pour en faire ce que l'on veut.
        fwrite($new_file, serialize($event));
        //Je referme mon fichier.
        fclose($new_file);
        //Conserver le nom du fichier.
        session_start();
        $_SESSION["event"] = $event;
        return true;
    }

    function readEvent() {
        //Afficher/lire mes recettes.
        $dossierRecettes = "./D01evenements/";
        //Scan le dossier recettes.
        $scanFileRecettes = scandir($dossierRecettes);
        //Fait une boucle sur le contenus de mon dossier.
        foreach ($scanFileRecettes as $content) {
            //Vérifie que c'est un dossier et sai sa l'ai alors..
            if (!is_dir($dossierRecettes . $content)) {
                //affiche moi les fichiers contenus dans ce dossier.
                echo basename($content);
                echo file_get_contents($dossierRecettes . $content);
            }
        }
    }

}
