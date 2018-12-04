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
use Mini\Core\Session;
use Mini\Model\Producto;


class ProductosController extends Controller
{
    private $titulo;

    public function __construct()
    {
        parent::__construct();
        $this->titulo = 'Productos';
    }

    public function listar()
    {
        $productos = new Producto();
        $productos = $productos->getAll();

        echo $this->view->render('productos/listar',[
            'productos' => $productos,
            'titulo' => $this->titulo
        ]);
    }

    public function crear()
    {

        if ( ! $_POST ) {

            $this->view->addData(['titulo' => 'Crear Producto']);
            echo $this->view->render('productos/formularioProducto');

        } else {

            $fecha = date('Y-m-d');

            $datos = array ("nombre" => filter_var(trim(strtolower($_POST['nombre'])), FILTER_SANITIZE_STRING),
                "descripcion" => filter_var(trim(strtolower($_POST['descripcion'])), FILTER_SANITIZE_STRING),
                "fecha_alta" => $fecha,
                "marca" => filter_var(trim(strtolower($_POST['marca'])), FILTER_SANITIZE_STRING),
                "usuario_id" => 1,
                "categoria_id" => 1
            );

           $feedback = '';
           $errors = '';

            if ( Producto::insert($datos) ) {
                if (! is_null(Session::get('feedback_positive')) && count(Session::get('feedback_positive'))>0) {
                    $feedback = 'positive';
                    $errores = Session::get('feedback_positive');
                    var_dump($errores);
                }
                echo $this->view->render('login/usuarioregistrado');
            } else {
                if (! is_null(Session::get('feedback_negative')) && count(Session::get('feedback_negative'))>0) {
                    $feedback = 'negative';
                    $errores = Session::get('feedback_negative');
                }
                echo $this->view->render('login/registro', [
                    'errores' => $errores,
                    'datos' => $_POST,
                    'feedback' => $feedback,
                    'errors' => $errors
                ]);
            }


        }
    }

    public function editar()
    {

    }

}