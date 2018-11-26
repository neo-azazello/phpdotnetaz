<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller {
    
    public function index($request, $response) {

        return $this->view->render($response, 'home.twig');
    
    }

    public function tags($request, $response) {

        return $this->view->render($response, 'tags/all.twig');
    
    } 

    public function questions($request, $response) {

        return $this->view->render($response, 'questions/all.twig');
    
    } 

    public function view($request, $response) {

        return $this->view->render($response, 'questions/view.twig');
    
    } 
}