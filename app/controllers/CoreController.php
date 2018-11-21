<?php

class CoreController {

    protected $router;

    protected $dbData;

    public function __construct($routerParam) {
        $this->router = $routerParam;
        // Je crée une instance de DBData
        $this->dbData = new DBData();
    }

    // Méthode s'occupant d'afficher une template
    protected function show($viewName, $viewVars=array()) {
        // $viewVars est disponible dans chaque fichier de vue
        // // Je crée une variable qui sera dispo dans toutes les vues
        $viewVars['baseURL'] = $_SERVER['BASE_URI'];
        // dump($viewVars);exit;
        foreach ($viewVars as $viewVarName=>$viewVarValue) {
            // Je crée une variable pour chaque donnée transmise à la view
            // La clé du tableau, devient le nom de la variable
            $$viewVarName = $viewVarValue;
        }
        // Je crée une variable $router à partir de la propriété router
        $router = $this->router;
        include __DIR__.'/../views/header.tpl.php';
        include __DIR__.'/../views/'.$viewName.'.tpl.php';
        include __DIR__.'/../views/footer.tpl.php';
    }
}