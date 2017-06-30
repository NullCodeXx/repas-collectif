<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author solo
 */
class Event {
    public $event;
    
    function __construct($event) {
        $this->event = $event;
    }
    
    function getEvent() {
        return $this->event;
    }
    
    //Crée un form pour ajouter des evenements.
    function evenement() {
        echo "<h1> AJOUTER VOS RECETTES </h1>";
        //Formulaire d'inscription.
        echo"
        <main>
            <section>
                <div class='addrecette'>
                    <fieldset>
                    <form action='addrecettesave.php' method='POST'>
                        <p>
                        <label for='titleRecette'>Entrer le nom de votre recette.</label>
                        <input type='text' id='titleRecette'name='titleRecette' autocomplete='on' placeholder='Tarte'> 
                        </p>
                        <p>
                        <label for='priceRecette' >Estimation €</label>
                        <input type='number' id='priceRecette' name='priceRecette' autocomplete='on' placeholder='10€'> 
                        </p>
                        <p>
                        <label for='ingredientRecette' name='ingredientRecette'>Détaille vos ingrédients.</label>
                        </p>
                        <p>
                        <textarea rows='10' cols='50' id='ingredientRecette' name='ingredientRecette' autocomplete='on' placeholder='Caramel, pomme...'></textarea> 
                        </p>
                        <input type='submit' name='action' value='valider'>
                    </form>
                    </fieldset>
                </div>
            </section>
        </main>
                ";
    }
    
    //traitement du form.
    function traitementEvenement($event) {
        //verifie les champs.
        if (isset($event["titleRecette"]) && isset($event["priceRecette"]) && isset($event["ingredientRecette"])) {
            //Ajoute une l'instance users aux champs que nous avons recuperer.
            $user = new User($post["title"], $post["content"]);
            var_dump($user);
        }
    }

}
