<?php
// Import Route.php
include_once('Route.php');

// Création du fichier .htaccess si il n'existe pas
if( ! file_exists( __DIR__ . "/.htaccess")){
	include(__DIR__ . "/mk_htaccess.php");
	sleep(1);
}

load_class_dir('public');

$route = new Route();

$route->add('/', 'Home' );
$route->add( '/about', 'About' );
$route->add('/contact', 'Contact' );
$route->add('/user', 'User' );
$route->add('/test', function(){ echo "Ceci est une page de test !"; } );
$route->add('/test/hello', function(){ echo "routage suplémentaire"; } );


$route->get('');
echo "<hr />";
$route->submit('');
echo "<hr />";
echo '<pre>';
print_r($route);


// Fonction de chargement d'une classe
function load_class_dir($mydir){
    foreach (glob("./".$mydir."/*.php") as $classfile){
        include_once $classfile;
    }
}