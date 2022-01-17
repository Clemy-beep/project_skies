<?php

use App\Router\Router;

require __DIR__ . '/vendor/autoload.php';


$router = new Router($_GET['url']);

$router->get('/articles/:slug-:id', function ($slug, $id) use ($router) {
    echo $router->url('articles', ['slug' => $slug, 'id' => $id]);
}, 'articles')->with('id', '[0-9]+')->with('slug', '[a-z\0-9]+');
$router->get('/posts/:id', function ($id) {
    echo "Voila l'article $id";
});
$router->post('/client', function () use ($router) {
    echo $router->url('client');
});
$router->get('/', function () {
    echo "Bienvenue sur ma homepage !";
});
$router->run(); 


//AppController::createTicket();
