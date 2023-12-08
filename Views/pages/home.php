<section class="container">
    <div class="d-flex flex-row mx-5 mx-md-0 mt-4">
        <div class="align-self-center">
            <h1>Bienvenue Chez Simply A House</h1>
            <p class="mt-4">
                La société <strong>Simply A House</strong>, groupement
                d'agences qui vendent des maisons individuelles ou
                mittoyennes en <strong>France</strong>, est née de
                l'ambition, accompagner ses clients dans la réussite
                d'un des projets le plus importants dans leur vie :
                l'achat <strong>d'une maison.</strong>
                <br><br>
                <strong>Simply A House</strong> vous accompagne tout au
                long de votre projet d'acquisition de maison, de la
                recherche de la réservation jusqu'à la remise des clés.
            </p>
        </div>
        <img src="assets/images/bienvenue.JPG" class="d-none d-md-block" alt="image de bienvenue" />
    </div>
</section>
<section class="container">
    <h1 class="text-center text-md-start">Les dernières annonces</h1>
    <!-- Annonce -->
    <div class="container overflow-hidden text-center">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
        <?php
            for ($i = 0; $i < count($ads); $i++) {
                if ($i !== 2){
        ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card p-0 mt-3 position-relative">
                    <a href="<?= $ads[$i]->getHref() ?>" class="text-decoration-none text-black">
                        <img src="<?= $ads[$i]->getImgUrl() ?>" class="card-img-top" alt="image de l'annonce" style="z-index: 100;">
                        <div class="card-body">
                            <p class="card-text text-start px-4">
                                <span class="d-none d-lg-block">
                                    <?= $ads[$i]->getAddress()->getCity() ?>
                                </span>
                                <span>
                                    <?= $ads[$i]->getTitle() ?>
                                </span>
                                <span class="d-none d-lg-block">
                                    <?= $ads[$i]->getPrice() ?> &euro;
                                </span>
                                <span>
                                    <?= $ads[$i]->getSize() ?> m²
                                </span>
                                <span class="d-none d-lg-block">
                                    <?= $ads[$i]->getRoom() ?> pièce(s)
                                </span>
                                <span class="d-none d-lg-block">
                                    <?= $ads[$i]->getBedroom() ?> chambre(s)
                                </span>
                                <span class="d-none d-md-block">
                                    <?= $ads[$i]->getShortDescription() ?>
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
                            <a href="<?= BASE_URL."houses"?>"><button class="btn-house">En voir +</button></a>
                        </div>
                    </a>
                </div>
            </div>
    <?php   }
        }
    ?>
        </div>
    </div>
    <div class="col-12 text-center my-3">
        <button class="btn-house"><a href="/houses">En voir +</a></button>
    </div>
</section>