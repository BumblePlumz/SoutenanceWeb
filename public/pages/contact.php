
<?php

class Contact {

    public function __construct() {
       echo "Bienvenue sur la page Contact";
       $this->_other();
    }

    private function _other() {
        echo "<br />Ceci est une autre fonction sur la page Contact";
    }
    
}