<?php
namespace App\Core;

use App\Models\entity\Annonce;
use App\Models\repository\AnnonceDAO;

class AppFonctions
{
    /**
     * Liste des feuilles de style à ajouter au head
     * @var array
     */
    public static $feuillesDeStyleAjoutees = array();
    
    /**
     * Liste des scripts à ajouter au head
     * @var array
     */
    public static $feuillesDeScriptAjoutees = array();

    /**
     * Liste des annonces en cache
     * @var array
     */
    public static $adsList = array();

    /**
     * Ajoute une feuille de style à un contenu spécifique
     * @param string Chemin à partir du dossier /css/xxx/xxx.css
     * @return void
     */
    public static function addStyle($route):void
    {
        if (!in_array($route, self::$feuillesDeStyleAjoutees)) {
            // Démarrer la sortie en tampon
            ob_start(); 
            
            // Ajouter les balises HTML pour les feuilles de style CSS
            echo "<link rel='stylesheet' type='text/css' href='".ASSETS_PATH."css".$route.".css'>";
            
            // Récupérer le contenu de la variable tampon et on la stock dans la propriété static
            array_push(self::$feuillesDeStyleAjoutees, ob_get_clean()); 
        }
    }
    /**
     * Ajout d'un script js à un contenu spécifique
     * @param string nom du fichier SANS l'extansion js
     * @param string Attribut defer/async
     * @return void
     */
    public static function addScript($fichier, $param):void
    {
        if (!in_array($fichier, self::$feuillesDeScriptAjoutees)) {
            
            // Démarrer la sortie en tampon
            ob_start();

            // Ajouter les balises HTML pour les scripts JS
            echo "<script src='".ASSETS_PATH."js/".$fichier.".js' ".$param."></script>";

            // Récupérer le contenu HTML de la variable tampon et on la stock dans la propriété static
            array_push(self::$feuillesDeScriptAjoutees, ob_get_clean());
        }
    }

    /**
     * Fonction print_r personnalisé directement avec les balises <pre>
     * @param [objet] $data
     * @return void
     */
    public static function my_print_r($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public static function populateAds():void
    {
        try {
            $tempAdsList = AnnonceDAO::getInstance()->readAll();
            if (!empty($adsList) && !empty($tempAdsList)){
                foreach ($tempAdsList as $ads){
                    if (array_search($ads->getHref(), self::$adsList) === false){
                        self::$adsList[] = $ads;
                    }
                }
            }else{
                self::$adsList = $tempAdsList;
            }
        }catch(PDOException $e){
            
        }
    }
}