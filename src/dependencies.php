<?php
// DIC configuration

$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

//models
$container['models'] = function ($c) {
    $models = $c->get('settings')['models'];
    $modelArray = [];
    foreach($models as $model => $modelClass) {
        $modelArray[$model] = new $modelClass($c);
    } 
    return $modelArray;
};

//doctrine
$container['entityManager'] = function ($c) {
    $settings = $c->get('settings')['doctrine'];
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['meta']['entity_path'],
        $settings['meta']['auto_generate_proxies'],
        $settings['meta']['proxy_dir'],
        $settings['meta']['cache'],
        false
    );
    $entityManager = Doctrine\ORM\EntityManager::create($settings['connection'], $config);
    return $entityManager;
};