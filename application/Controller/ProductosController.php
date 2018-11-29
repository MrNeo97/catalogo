<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/11/18
 * Time: 21:16
 */

namespace Mini\Controller;

use Mini\Core\Controller;
use Mini\Core\View;


class ProductosController extends Controller
{
    private $titulo;

    public function __construct()
    {
        parent::__construct();
        $this->titulo = 'Productos';
    }

    public function crear()
    {
        $this->view->addData(['titulo' => 'Crear Producto']);
        echo $this->view->render('productos/index');
    }
}