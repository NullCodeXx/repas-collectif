<?php

/*
 * Class user Contient pseudo et mot de passe en argument rien de plus.
 * On souhaite recuperer/conserver les 2 proprieter avec les getPseudo et getMdp.
 */

/**
 * Description of User
 *
 * @author solo
 */
class User {
    private $pseudo;
    private $mdp;
    
    function __construct($pseudo, $mdp) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
    }
    
    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }
}
