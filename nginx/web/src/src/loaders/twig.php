<?php
// Register Twig View helper
$container = $app->getContainer();


$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../app/views');
    // [
    //     'cache' => '/tmp'
    // ]

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new \Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};
