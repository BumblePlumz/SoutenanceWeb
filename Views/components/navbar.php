<nav class="navbar navbar-expand-md rouge-bg">
    <div class="container-fluid">
        <div class="navbar-brand d-flex banner-logo" onclick="sendHome()">
            <a href="#"><img src="<?= ASSETS_PATH."images/logo.png"?>" alt="Logo compagnie" /></a>
            <div class="ms-4 text-white">
                <h2 class="mb-0">Simply A House</h2>
                <p>votre nouveau projet de vie</p>
            </div>
        </div>
        <button class="navbar-toggler btn-menu text-bg-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <i class="btn-menu__bars" aria-hidden="true"></i>
        </button>

        <div class=" collapse navbar-collapse rouge-bg menu-list" id="navbarSupportedContent">
            <ul id="ul-menu" class="navbar-nav mb-2 mb-lg-0 justify-content-end">
                <li class="nav-item">
                    <a class="text-white nav-link <?= ($pageActive === "home") ? 'active' : ''; ?>" aria-current="page" href="<?= BASE_URL."home"?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link <?= ($pageActive === "about") ? 'active' : ''; ?>" href="<?= BASE_URL."about"?>">A Propos</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link <?= ($pageActive === "houses") ? 'active' : ''; ?>" href="<?= BASE_URL."houses"?>">Nos maisons</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link <?= ($pageActive === "contact") ? 'active' : ''; ?>" href="<?= BASE_URL."contact"?>">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
