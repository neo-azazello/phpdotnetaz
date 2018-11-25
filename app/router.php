<?php
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

//Despite container has already instantiated Home Controller here in router we may access the methode :index
$app->get('/', 'HomeController:index')->setName('home');

$app->group('', function () {

    $this->get('/signup', 'AuthController:getSignUp')->setName('auth.signup');
    $this->post('/signup', 'AuthController:postSignUp');
    $this->get('/signin', 'AuthController:getSignIn')->setName('auth.signin');
    $this->post('/signin', 'AuthController:postSignIn');

})->add(new GuestMiddleware($container));

$app->group('', function () {
    
    $this->get('/signout', 'AuthController:getSignOut')->setName('auth.signout');
    $this->get('/passchange', 'PasswordController:getChangePassword')->setName('password.change');
    $this->post('/passchange', 'PasswordController:postChangePassword');

})->add(new AuthMiddleware($container));