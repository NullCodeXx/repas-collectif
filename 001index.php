<?php
echo "INDEX REPAS-COLLECTIF";

//*****INSCLUS LES PAGES******
//____________________________

include_once "./C01Formulaire.php";
include_once "./C00Database.php";
include_once "./C02User.php";
include_once "./C03Event.php";

//*****CREATION D'INSTANCE******
//______________________________

$formulaire = new Formulaires();
$database = new Database();
//$user = new User($pseudo, $mdp);
//$event = new Event($event);

//*****FUNCTION DES INSTANCES DE CLASS.******
//___________________________________________


$formulaire->formulaire();
//Filtre toute les donner de mon post et me les renvoie.
$formulaire->traitementFormulaire(filter_input_array(INPUT_POST));
$formulaire->authentification();
$database->authUser();
//$user->getMdp();
//$user->getPseudo();
//$event->getEvent();



























/* USE
use app\Database;

public $database;

public function __construct(Database $database)
{
    $this->database = $database;
} -->
*/