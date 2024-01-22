<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/message', 'Home::sendEmail');
$routes->get('projets', 'Projets::index');
$routes->get('projets/be', 'Be::index');
$routes->get('projets/pc', 'Pc::index');
$routes->get('projets/emb', 'Emb::index');
$routes->get('projets/cv', 'Cv::index');
$routes->get('projets/ci', 'Ci::index');
$routes->get('projets/step', 'Step::index');
$routes->get('articles', 'Articles::index');
$routes->post('articles', 'Articles::index');
$routes->get('show', 'Articles::show');

service('auth')->routes($routes);
