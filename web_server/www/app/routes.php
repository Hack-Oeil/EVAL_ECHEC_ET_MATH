<?php

return function(\FastRoute\RouteCollector $router) {
  
    // Page d'accueil
    $router->addRoute('GET', '/', 'App\Controller\HomeController::print');
    $router->addRoute('POST', '/', 'App\Controller\HomeController::print');

};
