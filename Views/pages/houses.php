<?php

use App\Core\AppFonctions;

AppFonctions::addScript("houses", "defer");

?>
<section class="container pt-4">
    <div class="col-12 d-flex flex-row col-10 mx-auto">
        <div class="align-self-center">
            <h1>Simply A House : Toutes les Maisons</h1>
            <p class="mt-4">
                Que votre choix se porte sur une <strong>maison traditionnelle</strong> ou sur une
                <strong>maison contemporaine</strong>, notre équipe expériementée, composée d'un repsonsable
                qualité et de technico-commerciaux,
                est là pour vous accompagner durant votre projet.
            </p>
        </div>
    </div>
</section>
<section class="container">
    <div class="col-12 mx-auto">
        <h1 class="text-center text-md-start">Choisissez Votre Maison</h1>
        <div class="d-flex flex-row justify-content-around search-bar">
            <div class="col-6 my-auto">
                <div class="input-group">
                    <input type="text" class="form-control rounded-1"
                           placeholder="Ville, code postal, département,...">
                </div>
            </div>
            <div class="houses-menu d-md-none d-flex justify-content-center align-items-center text-white">
                <p class="my-auto me-2">Filtres</p>
                <div class="dropdown">
                    <button class="btn btn-house dropdown-toggle" type="button" id="dropdown-filtres-mobile"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-bars fa-xl align-self-center"></i>
                    </button>
                    <ul class="dropdown-menu text-center" aria-labelledby="dropdown-filtres-mobile">
                        <li><a class="dropdown-item" href="#">maison traditionnelle</a></li>
                        <li><a class="dropdown-item" href="#">maison contemporaine</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-none d-md-flex justify-content-center align-items-center">
                <button class="btn btn-house dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    <!-- <i class="fa-solid fa-house"></i> -->
                    <span class="p-2">Tous les Filtres</span>
                </button>
                <ul class="dropdown-menu text-center">
                    <li><a class="dropdown-item" href="#">maison traditionnelle</a></li>
                    <li><a class="dropdown-item" href="#">maison contemporaine</a></li>
            </div>
        </div>
    </div>
</section>
<section id="annonces">
    <!-- Annonce -->
    <div class="container overflow-hidden text-center">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
            <?php
            if (!empty($ads)) {
            for ($i = 0; $i < 9; $i++) {
                if ($i !== 2){
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card p-0 mt-3">
                            <a href="<?= $ads[$i]->getHref() ?>" class="text-decoration-none text-black position-relative">
                                <img src="<?= $ads[$i]->getImgUrl() ?>" class="card-img-top img-fluid" alt="image de l'annonce" style="z-index: 100;">
                                <div class="card-body">
                                    <p class="card-text text-start px-4">
                                        <span>
                                            <?= $ads[$i]->getTitle() ?><br>
                                        </span>
                                        <span>
                                            <?= $ads[$i]->getSize() ?> m²<br>
                                        </span>
                                        <span class="d-none d-lg-block">
                                            <?= $ads[$i]->getPrice() ?> &euro;<br>
                                        </span>
                                        <span>
                                            <?= $ads[$i]->getAddress()->getCity() ?><br>
                                        </span>
                                        <span class="d-none d-lg-block">
                                            <?= $ads[$i]->getRoom() ?> pièce(s)<br>
                                        </span>
                                        <span class="d-none d-lg-block">
                                            <?= $ads[$i]->getBedroom() ?> chambre(s)<br>
                                        </span>
                                        <span class="d-none d-md-block">
                                            <?= $ads[$i]->getShortDescription() ?><br>
                                        </span>
                                    </p>
                                </div>
                                <div class="d-none d-lg-block position-absolute start-0 rouge-bg" style="top: 4%;">
                                    <p class="m-0 p-0 px-4 text-white">
                                        <?= $ads[$i]->getPrice() ?> &euro;
                                    </p>
                                </div>
                                <div class="d-none d-lg-block position-absolute end-0" style="top: 3%;">
                                    <span>
                                        <img src="<?= ASSETS_PATH."images/coeur.png"?>" alt="Heart" style="width: 75px; height: 75px; z-index: 9999">
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php   }else{ ?>
                    <div class="col-12 col-md-6 col-lg-4 overflow-hidden">
                        <div class="card h-100 mt-3 position-relative">
                            <a href="" class="text-decoration-none text-black h-100">
                                <img src="<?= ASSETS_PATH."images/FinancerMaison.jpg"?>" class="card-img-top h-100" alt="Publicité">
                                <div class="position-absolute advertisement">
                                    <p class="text-white fs-3">
                                        Comment <br><br> financer <br><br> mon projet?
                                    </p>
                                    <button class="btn-house mt-3"><a href="/houses">En voir +</a></button>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php   }
            }}
            ?>
        </div>
</section>
<section>
    <div class="my-4">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a id="prev" class="page-link houses-navi" href="#">Previous</a></li>
                <li class="page-item"><a id="first" class="page-link houses-navi" href="<?php BASE_URL."/houses"?>"">1</a></li>
                <li class="page-item"><a id="second" class="page-link houses-navi" href="<?php BASE_URL."/houses/reload/1"?>">2</a></li>
                <li class="page-item"><a id="third" class="page-link houses-navi" href="<?php BASE_URL."/houses/reload/2"?>"">3</a></li>
                <li class="page-item"><a id="next" class="page-link houses-navi" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</section>