<?php
// Routes

$routes = [
    '/title[/{id}]' => [
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
    '/project[/{id}]' => [
        'name' => 'project',
        'methods' => ['GET'],
        'controller' => \Controller\ProjectController::class
    ]
];

foreach($routes as $route => $routeInfo) {
    $controllerMethod = empty($routeInfo['controllerMethod']) ? ':route' : $routeInfo['controllerMethod'];
    $app->map($routeInfo['methods'], $route, $routeInfo['controller'] . $controllerMethod)->setName($routeInfo['name']);
}

function getTitle($request, $response, $args)
{
    global $app;
    $app->getContainer()['logger']->info("Title requested");
    $newResponse = $response->withJson(['title' => "Uber, but for sarcasm"]);
    return $newResponse;
}