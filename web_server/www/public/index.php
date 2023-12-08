<?php
// Permet de capture l'erreur sur l'eval
function evalErrorHandler($errno, $errstr) {
    return $errstr;
}
// Configuration du gestionnaire d'erreurs pour capturer E_PARSE (erreurs de syntaxe)
set_error_handler('evalErrorHandler', E_PARSE);

require_once '../vendor/autoload.php';

$kernel = new Yoop\Kernel();

(new Yoop\Database\Wait)->tryMySQL();

$router = $kernel->getRouter();
$router->load('/app/routes.php');
$router->run($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);