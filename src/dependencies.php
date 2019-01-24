<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// respect Validator
$validator = new App\Validator;
$container['validator'] = function ($container) use ($validator) {
    return $validator;
};

// Service factory for the ORM

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

/*
$dbconfig = $container->get('settings')['db'];

$capsule = new \Illuminate\Database\Capsule\Manager;

foreach ($dbconfig['connections'] as $cname => $connection)
{
    $cname = $cname == $dbconfig['default'] ? 'default' : $cname;

    $capsule->addConnection($connection, $cname);
}

$capsule->setFetchMode($dbconfig['fetch']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$ci['db'] = function ($ci) use($capsule) {
    return $capsule;
};

$container['db'] = function ($c) {
  $capsule = new \Illuminate\Database\Capsule\Manager;
  $capsule->addConnection($c['settings']['db']);

  $capsule->setAsGlobal();
  $capsule->bootEloquent();

  return $capsule;
};*/
