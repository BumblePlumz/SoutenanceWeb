<?php

namespace App\Controllers;

use App\Core\AppFonctions;

class HomeController extends Controller
{
    public function index()
    {
        // Chargement des annonces
        AppFonctions::populateAds();
        $ads = [];
        if (!empty(AppFonctions::$adsList)){
            
            for ($i = 0; $i < 9; $i++) {
                $description = AppFonctions::$adsList[$i]->getDescription();
            $limite = 60;
            $shortDesc = strlen($description) > $limite ? substr($description, 0, $limite) . "..." : $description;
            $ads[$i] = AppFonctions::$adsList[$i];
            $ads[$i]->setShortDescription($shortDesc);
            }
        }   
        
        $this->render('pages/home', [
            "pageActive" => "home",
            "ads" => $ads
        ]);
    }
}