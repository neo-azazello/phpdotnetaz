<?php
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->get('/', 'HomeController:index')->setName('home');
$app->get('/tags', 'HomeController:tags')->setName('tags');
$app->get('/questions', 'HomeController:questions')->setName('questions');


/* $app->group('', function () {

    $this->get('/signup', 'AuthController:getSignUp')->setName('auth.signup');
    $this->post('/signup', 'AuthController:postSignUp');
    $this->get('/signin', 'AuthController:getSignIn')->setName('auth.signin');
    $this->post('/signin', 'AuthController:postSignIn');

})->add(new GuestMiddleware($container));

$app->group('', function () {
    
    $this->get('/signout', 'AuthController:getSignOut')->setName('auth.signout');
    $this->get('/passchange', 'PasswordController:getChangePassword')->setName('password.change');
    $this->post('/passchange', 'PasswordController:postChangePassword');

})->add(new AuthMiddleware($container)); */