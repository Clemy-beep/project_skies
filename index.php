<?php

use App\Controller\AppController;
use App\Router\Router;

require __DIR__ . '/vendor/autoload.php';


$router = new Router($_GET['url']);

// $router->get('/articles/:slug-:id', function ($slug, $id) use ($router) {
//     echo $router->url('articles', ['slug' => $slug, 'id' => $id]);
// }, 'articles')->with('id', '[0-9]+')->with('slug', '[a-z\0-9]+');
// $router->get('/posts/:id', function ($id) {
//     echo "Voila l'article $id";
// });
$router->get('/client/update/id=:id', function ($id) {
    AppController::showClient($id);
});
$router->post('/client/update/id=:id', function ($id){
    AppController::updateClient($id);
});
$router->get('/client/delete/id=:id', function ($id){
    var_dump($id);
    AppController::deleteClient($id);
});
$router->post('/client/delete/id=:id', function ($id){
    var_dump($id);
    AppController::deleteClient($id);
});
$router->get('/client/create', function () {
   AppController::showForm();
});
$router->post('/client/create', function () {
    AppController::formCheck();
});
$router->get('/', function () {
    AppController::index();
});
$router->run(); 



//AppController::createTicket();
