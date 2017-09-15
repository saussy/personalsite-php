<?php
// Routes

$routes = [
    '/titles[/{id}]' => [
        'name' => 'title',
        'methods' => ['GET'],
        'controller' => \Controller\TitleController::class,
    ],
    '/randomTitle' => [
        'name' => 'randomTitle',
        'methods' => ['GET'],
        'controller' => \Controller\TitleController::class,
        'controllerMethod' => ":random"
    ],
    '/projects[/{id}]' => [
        'name' => 'project',
        'methods' => ['GET'],
        'controller' => \Controller\ProjectController::class
    ],
    '/posts[/{id}]' => [
        'name' => 'post',
        'methods' => ['GET'],
        'controller' => \Controller\PostController::class
    ]
];

foreach($routes as $route => $routeInfo) {
    $app->getContainer()['logger']->info("Title requested");    
    $controllerMethod = empty($routeInfo['controllerMethod']) ? ':route' : $routeInfo['controllerMethod'];
    $app->map($routeInfo['methods'], $route, $routeInfo['controller'] . $controllerMethod)->setName($routeInfo['name']);
}
