<?php
use Slim\Http\Request;
use Slim\Http\Response;


$container = $app->getContainer();
$container['User'] = function($c) {
    $view = $c->get("view"); // retrieve the 'view' from the container
    return new User($view);
};

// Routes
$app->get("/hello", \app\controllers\User::class. ':getUserInformation');

// $app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");
//
//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });
