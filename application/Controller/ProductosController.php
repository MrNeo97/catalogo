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

    public function index()
    {
        $productos = new Producto();
        $productos = $productos->getAll();

        $this->view->addData(['titulo' => 'Listado Productos']);
        echo $this->view->render('productos/index', [
            'productos' => $productos,
            'titulo' => $this->titulo
        ]);
    }

    public function listar()
    {
        if (Session::userIsLoggedIn()) {
            $productos = new Producto();
            $productos = $productos->getAll();

            $this->view->addData(['titulo' => 'Listado Productos']);
            echo $this->view->render('productos/listar', [
                'productos' => $productos,
                'titulo' => $this->titulo
            ]);
        }  else {
            header('Location: /login');
        }
    }

    public function crear()
    {
        if (Session::userIsLoggedIn()) {
            if (!$_POST) {

                $this->view->addData(['titulo' => 'Crear Producto']);
                echo $this->view->render('productos/formularioProducto');

            } else {

                $fecha = date('Y-m-d');


                $datos = array("nombre" => filter_var(trim(strtolower($_POST['nombre'])), FILTER_SANITIZE_STRING),
                    "descripcion" => filter_var(trim(strtolower($_POST['descripcion'])), FILTER_SANITIZE_STRING),
                    "fecha_alta" => $fecha,
                    "marca" => filter_var(trim(strtolower($_POST['marca'])), FILTER_SANITIZE_STRING),
                    "usuario_id" => Session::get()[0]->id,
                    "categoria_id" => filter_var(trim(strtolower($_POST['categoria_id'])), FILTER_SANITIZE_STRING)
                );

                $producto = new Producto;

                $errores = [];

                if ($producto->insert($datos)) {
                    echo $this->view->render('productos/productoinsertado');
                } else {
                    if (!is_null(Session::get('feedback_negative')) ) {
                        $errores = Session::get('feedback_negative');
                    }
                    echo $this->view->render('productos/formularioProducto', [
                        'errores' => $errores,
                        'datos' => $datos
                    ]);
                }

            }
        }  else {
            header('Location: /login');
        }
    }

    public function editar($id)
    {
        if (Session::userIsLoggedIn()) {

            if(!$id) {
                header('Location: /productos/listar');
            }

            $datos = Producto::getId($id);

            if ($datos) {

                $datos = ['id' => $datos->id, 'nombre' => $datos->nombre, 'descripcion' => $datos->descripcion,
                    'marca' => $datos->marca, 'categoria_id' => $datos->categoria_id
                    ];

                if (! $_POST) {

                    $this->view->addData(['titulo' => 'Modificar Producto']);
                    echo $this->view->render('productos/formularioProducto', [
                        'datos' => $datos,
                        'title' => 'Modificar'
                    ]);

                } else {

                    $datos = ['id' => $datos['id'], 'nombre' => $_POST['nombre'], 'descripcion' => $_POST['descripcion'],
                        'marca' => $_POST['marca'], 'categoria_id' => $_POST['categoria_id']
                    ];

                    $errores = [];

                    $producto = new Producto;

                    if ($producto->editar($datos)) {
                        echo $this->view->render('productos/productomodificado');
                    } else {
                        if (!is_null(Session::get('feedback_negative')) ) {
                            $errores = Session::get('feedback_negative');
                        }
                        $this->view->addData(['titulo' => 'Modificar Producto']);
                        echo $this->view->render('productos/formularioProducto', [
                            'datos' => $datos,
                            'errores' => $errores,
                            'title' => 'Modificar'
                        ]);
                    }

                }

            } else {
                header('Location: /productos/listar');
            }

        } else {
            header('Location: /login');
        }
    }

    public function eliminar($id)
    {

        if (Session::userIsLoggedIn() && Session::jefeIsLoggedIn()) {

            if( ! $id) {

                header('Location: /productos/listar');

            } else {

                $producto = new Producto;

                if ($producto->eliminar($id))
                {
                    header('Location: /productos/listar');

                } else {

                    $listar = $producto->getAll();
                    echo $this->view->render('productos/listar', [
                        'errores' => 'No se ha podido borrar la fila deseada',
                        'productos' => $listar
                    ]);
                }

            }

        } else {
            header('Location: /login');
        }
    }

}