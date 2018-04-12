<?php
$dev = ($_SERVER['dev'] == 1) ? true : false;
//phpinfo();exit;
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}
require __DIR__ . '/../vendor/autoload.php';

session_start();

try {
    // Instantiate the app
    $settings = require __DIR__ . '/../src/loaders/settings.php';
    
    $app = new \Slim\App($settings);

    require __DIR__ . '/../src/loaders/database.php';
    require __DIR__ . '/../src/loaders/redis.php';
    require __DIR__ . '/../src/loaders/twig.php';

    // Set up dependencies
    require __DIR__ . '/../src/loaders/dependencies.php';

    // Register middleware
    require __DIR__ . '/../src/loaders/middleware.php';

    // Register routes
    require __DIR__ . '/../src/loaders/routes.php';

    // Run app
    $app->run();
} catch (\Exception $runTimeException) {
    if ($dev) {
        print json_encode([
            "error" => $runTimeException->getMessage(),
            "stack"=>$runTimeException->getTrace()
        ]);
    } else {
        print json_encode(["notice"=>"An error occurred"]);
    }
}
