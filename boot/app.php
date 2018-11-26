<?php 

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/config.php";

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['view'] = function ($container) {

   $view = new \Slim\Views\Twig(__DIR__ . '/../views', [
       'cache' => false,
   ]);  
   
   $view->addExtension(new \Slim\Views\TwigExtension(
       $container->router,
       $container->request->geturi()
   ));

  /* $view->getEnvironment()->addGlobal('auth', [
        'check' => $container->auth->check(),
        'user' => $container->auth->user(),
   ]); */

    /* $view->getEnvironment()->addGlobal('flash', $container->flash); */
   
   return $view;
};

$container['validator'] = function ($container) {
    return new \App\Validation\Validator;
};

$container['HomeController'] = function ($container) {
    return new \App\Controllers\HomeController($container);
}; 
