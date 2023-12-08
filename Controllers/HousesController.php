<?php

namespace App\Controllers;

use App\Core\AppFonctions;

class HousesController extends Controller
{
    public function index():void
    {
        // Chargement des annonces
        if (empty(AppFonctions::$adsList)){
            AppFonctions::populateAds();
        }
        $ads = [];
        if (!empty(AppFonctions::$adsList)){
            for ($i = 0; $i < count(AppFonctions::$adsList); $i++) {
                $description = AppFonctions::$adsList[$i]->getDescription();
                $limite = 60;
                $shortDesc = strlen($description) > $limite ? substr($description, 0, $limite) . "..." : $description;
                $ads[$i] = AppFonctions::$adsList[$i];
                $ads[$i]->setShortDescription($shortDesc);
            }
        }
        $this->render('pages/houses', ["pageActive"=>"houses", "ads" => $ads], "pagesTemplate");
    }
    public function reload(int $pageNumber):void
    {
        // Chargement des annonces
        if (empty(AppFonctions::$adsList)){
            AppFonctions::populateAds();
        }
        $ads = [];
        if (!empty(AppFonction::$adsList)){
            $start = 9*$pageNumber;
            $end = $start+9;
            $counter = 0;
            for ($i = 9; $i < $end; $i++) {
                $description = AppFonctions::$adsList[$i]->getDescription();
                $limite = 60;
                $shortDesc = strlen($description) > $limite ? substr($description, 0, $limite) . "..." : $description;
                $ads[$counter] = AppFonctions::$adsList[$i];
                $ads[$counter]->setShortDescription($shortDesc);
                $counter++;
            }
        }
        $this->render('pages/houses', ["pageActive"=>"houses", "ads" => $ads], "pagesTemplate");
    }
}