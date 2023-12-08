<?php
use App\Core\AppFonctions;
// Pour afficher les erreurs si le serveur est mal configuré /etc/php/phpXX/apache2/php.ini
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= ASSETS_PATH."images/logo.png"?>" type="image/png" sizes="32x32">

    <link rel="preload" href="<?= ASSETS_PATH."css/bootstrap.min.css"?>"  as="style" onload="this.onload=null;this.rel='stylesheet'"><noscript><link rel="stylesheet" href="<?= ASSETS_PATH."css/bootstrap.min.css"?>" ></noscript>
    <link rel="preload" href="<?= ASSETS_PATH."css/swiper-bundle.min.css"?>"  as="style" onload="this.onload=null;this.rel='stylesheet'"><noscript><link rel="stylesheet" href="<?= ASSETS_PATH."css/swiper-bundle.min.css"?>" ></noscript>
    <link rel="preload" href="<?= ASSETS_PATH."fontawsome/css/all.min.css"?>"  as="style" onload="this.onload=null;this.rel='stylesheet'"><noscript><link rel="stylesheet" href="<?= ASSETS_PATH."fontawsome/css/all.min.css"?>" ></noscript>
    <link rel="preload" href="<?= ASSETS_PATH."css/index.css"?>"  as="style" onload="this.onload=null;this.rel='stylesheet'"><noscript><link rel="stylesheet" href="<?= ASSETS_PATH."css/index.css"?>" ></noscript>
    <link rel="preload" href="<?= ASSETS_PATH."css/home.css"?>"  as="style" onload="this.onload=null;this.rel='stylesheet'"><noscript><link rel="stylesheet" href="<?= ASSETS_PATH."css/home.css"?>" ></noscript>

    <script src="<?= ASSETS_PATH."js/swiper-bundle.min.js"?>" defer></script>
    <script src="<?= ASSETS_PATH."js/bootstrap.bundle.min.js"?>" defer></script>
    <script src="<?= ASSETS_PATH."js/swiperConfiguration.js"?>" defer></script>
    <script src="<?= ASSETS_PATH."js/index.js"?>" defer></script>


    <!-- Feuilles de style personnalisées par page -->
    <?php
    // Afficher les feuilles de style ajoutées
    foreach (AppFonctions::$feuillesDeStyleAjoutees as $feuilleDeStyle) {
        echo $feuilleDeStyle;
    }
    ?>

    <!-- Feuilles de Script personnalisées par page -->
    <?php
    // Afficher les feuilles de style ajoutées
    foreach (AppFonctions::$feuillesDeScriptAjoutees as $feuilleDeScript) {
        echo $feuilleDeScript;
    }
    ?>

    <title>Simply A House</title>
</head>

<body>
    <header>
        <div class="home-header">
            <div class="infos-banner row justify-content-end text-center bg-secondary-emphasis">
                <div class="col-3 col-lg-2 border-start border-4 border-black">
                    <a class="mx-2 blacky" href="https://www.facebook.com/?locale=fr_FR"><i class="fa-brands fa-facebook-f"></i></a>
                    <a class="mx-2 blacky" href="https://twitter.com/?lang=fr"><i class="fa-brands fa-twitter"></i></a>
                    <a class="mx-2 blacky" href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                    <a class="mx-2 blacky" href="https://fr.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <div class="col-3 col-lg-2 border-start border-5 border-black">
                    <a href="./contact" class="text-decoration-none text-black">
                        <i class="fa-solid fa-phone" style="color: #000000"></i>
                        <span>02 97 88 88 88</span>
                    </a>
                </div>
                <div class="col-3 me-5 col-lg-2 border-start border-end border-5 border-black">
                    <a href="#" class="text-decoration-none text-black" data-bs-toggle="modal" data-bs-target="#follow-modal">
                        <i class="fa-solid fa-house-laptop" style="color: #000000"></i>
                        <span>Suivre mon projet</span>
                    </a>
                </div>
            </div>
            <!-- Swiper -->
            <div class="swiper mySwiper d-none d-md-block">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="swiper img-slider" src="<?= ASSETS_PATH."images/slide1.JPG"?>" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper img-slider" src="<?= ASSETS_PATH."images/slide2.JPG"?>" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper img-slider" src="<?= ASSETS_PATH."images/slide3.JPG"?>" alt="" />
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <nav class="navbar navbar-expand-md home-navy pt-2 pt-md-0">
                <div class="container-fluid">
                    <div class="navbar-brand d-flex banner-logo" onclick="sendHome()">
                        <a href="#"><img src="<?= ASSETS_PATH."images/logo.png"?>" alt="Logo compagnie" /></a>
                        <div class="ms-4 text-white">
                            <h2 class="mb-0">Simply A House</h2>
                            <p>votre nouveau projet de vie</p>
                        </div>
                    </div>
                    <button class="navbar-toggler btn-menu mx-auto mx-md-0" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa-solid fa-bars fa-2x"></i>
                    </button>

                    <div class=" collapse navbar-collapse menu-list justify-content-end" id="navbarSupportedContent">
                        <ul id="ul-menu" class="navbar-nav mb-2 mb-lg-0 mx-auto mx-md-0">
                            <li class="nav-item text-center">
                                <a class="text-white nav-link <?= ($pageActive === "home") ? 'active' : ''; ?>" aria-current="page" href="<?= BASE_URL."home"?>">Home</a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="text-white nav-link <?= ($pageActive === "about") ? 'active' : ''; ?>" href="<?= BASE_URL."about"?>">A Propos</a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="text-white nav-link <?= ($pageActive === "houses") ? 'active' : ''; ?>" href="<?= BASE_URL."houses"?>">Nos maisons</a>
                            </li>
                            <li class="nav-item text-center">
                                <a class="text-white nav-link <?= ($pageActive === "contact") ? 'active' : ''; ?>" href="<?= BASE_URL."contact"?>">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main id="content" class="container content overflow-hidden">
        <?= $content; ?>
    </main>
    <footer class="container-fluid p-0">
        <?= $footer; ?>
    </footer>
    <!-- Components -->
    <div class="fixed-icons">
            <div class="row icon-phone">
                <a href="#" class="phone-button" data-toggle="tooltip" data-placement="right" title="02 57 87 71 85"><i class="fa-solid fa-phone text-dark"></i></a>
            </div>
            <div class="row icon-mail mt-2">
                <a href="#" class="email-button" data-bs-toggle="modal" data-bs-target="#ContactModal"><i
                            class="fa-solid fa-envelope text-dark"></i></a>
            </div>
        </div>
    <!-- Modals -->
    <div class="modal fade" id="follow-modal" tabindex="-1" aria-labelledby="follow-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header rouge-bg">
                    <h1 class="modal-title fs-5 text-white" id="follow-modal-label">Se connecter</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body align-items-center">
                    <form id="connect-form" action="" method="POST">
                        <div class="mb-3 col-8 mx-auto">
                            <label for="email" class="col-form-label">Email :</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="mb-3 col-8 mx-auto">
                            <label for="password" class="col-form-label">Mot de passe : </label>
                            <input type="text" class="form-control" id="password">
                        </div>
                    </form>
                    <div class="d-flex flex-column text-center">
                        <a class="text-dark" href="#">S'inscrire</a>
                        <a class="text-dark" href="#">Mot de passe oublié?</a>
                    </div>
                </div>
                <div class="modal-footer rouge-bg">
                    <button type="button" class="btn-house mx-auto" data-bs-dismiss="modal">Fermer</button>
                    <button id="btn-connect" type="button" class="btn-house mx-auto">Se connecter</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ContactModal" tabindex="-1" aria-labelledby="contact-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header rouge-bg">
                    <h5 class="modal-title" id="contact-modal-label">Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire de contact -->
                    <form id="contact-form" action="" method="POST">
                        <div class="mb-3 col-8">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="mb-3 col-8">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3 col-8">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" aria-label="Votre message"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer rouge-bg">
                    <button type="button" class="btn-house mx-auto" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" id="btn-form" class="btn-house mx-auto">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>