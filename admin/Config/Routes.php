<?php

namespace admin\Config;

use CodeIgniter\Router\RouteCollection;
use Config\Services;

service('auth')->routes($routes);

/**
 * @var RouteCollection $routes
 */

$routes->group('admin', ['namespace'=>'admin\Controllers', 'filter'=>'group:agent, admin'], static function ($routes){
    $routes->get('', 'Admin::index');
    $routes->get('set-password', 'Password::set');
    $routes->post('set-password', 'Password::update') ;
    $routes->get('profil', 'Profil::index');
    $routes->get('budget', 'Budget::index');
    $routes->get('messages', 'Messages::index');
    $routes->get('services', 'Services::index');
    $routes->group('services/com', ['namespace'=>'admin\Controllers', 'filter'=>'group:com, admin'], static function ($routes){
        $routes->group('', ['namespace'=>'admin\Controllers', 'filter'=>'group:com, admin'], static function ($routes){
            $routes->get('', 'Communication::index');
            $routes->group('site', ['namespace'=>'admin\Controllers', 'filter'=>'group:com, admin'], static function ($routes){
                $routes->get('', 'Site::index');
                $routes->get('gestion-articles', 'Articles::menu');
                $routes->group('', ['namespace'=>'admin\Controllers', 'filter'=>'group:com, admin'], static function ($routes){
                    $routes->get('articles/index', 'Articles::index');
                    $routes->get('articles/new', 'Articles::new');
                    $routes->post('articles/create', 'Articles::create');
                    $routes->get('articles/show', 'Articles::show');
                    $routes->get('articles/(:num)/edit', 'Articles::edit/$1');
                    $routes->get('articles/(:num)/edit/image', 'Articles::getArticleImage/$1');
                    $routes->patch('articles/update', 'Articles::update');
                    $routes->get('articles/delete', 'Articles::confirmDelete');
                    $routes->delete('articles/delete', 'Articles::delete');
                });
            });
        });
    });
});
