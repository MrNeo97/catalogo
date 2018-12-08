<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Core\Session;
use phpDocumentor\Reflection\Location;

class HomeController extends Controller
{
    private $titulo;

    public function __construct()
    {
        parent::__construct();
        $this->titulo = 'Inicio';
    }

    public function index()
    {
        if (Session::userIsLoggedIn()) {

            $user = Session::get('user')[0];
            echo $this->view->render('home/index', [ 'user' => $user]);
        } else {
            header('Location: /login');
        }
    }


}
