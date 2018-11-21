<?php

class MainController extends CoreController {

    // Méthode de la page d'accueil
    public function home() {
        $characterDetails = $this->dbData->getCharacterDetails();
        // dump ($characterDetails);

        // J'affiche la template home.tpl.php
        $this->show('home', ['characters' => $characterDetails]);
    }

    public function error404() {
        // J'affiche la template 404.tpl.php
        $this->show('404');
    }

}