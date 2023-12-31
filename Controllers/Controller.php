<?php

namespace App\Controllers;

abstract class Controller
{
    /**
     * Afficher une vue
     *
     * @param string $fichier
     * @param array $data
     * @param string $template
     * @return void
     */
    public function render(string $fichier, array $data = [], $template = 'homeTemplate')
    {
        // Récupère les données et les extrait sous forme de variables
        extract($data);

        // On démarre le buffer de sortie
        ob_start(); // A partir de ce point toute sortie est conservée en mémoire

        // Crée le chemin et inclut le fichier de vue | ex : portfolio(ROOT) + /View/ + 'rdv/index'($data) + .php
        require_once(ROOT . '/Views/' . $fichier . '.php');

        // Transfère les données du buffer dans la variable $contenu
        $content = ob_get_clean();

        ob_start();
        require_once(ROOT.'/Views/components/footer.php');
        $footer = ob_get_clean();

        ob_start();
        require_once(ROOT.'/Views/components/navbar.php');
        $navbar = ob_get_clean();

        // Template de la page il s'agit du fichier contenant le menu, le footer, etc... par défaut.
        require_once ROOT.'/Views/'.$template.'.php';
    }
}
