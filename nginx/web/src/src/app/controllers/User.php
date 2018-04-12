<?php
namespace app\controllers;

use \Slim\Http\Request;
use \Slim\Http\Response;

class User
{

    public function __construct(\Slim\Container $container)
    {
        $this->container = $container;
    }

    public function getUserInformation(Request $request, Response $response, $args)
    {
        $dataset = json_decode(
            file_get_contents("http://api-nginx/v1/users/information/8.8.8.8")
        );

        print "<XMP>";
        print_r($dataset);
        print "</XMP>";

        return $this->container->view->render($response, 'profile.html', [
            'dataset' => $dataset
        ]);
    }
}
