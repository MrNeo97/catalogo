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

    public function editar($nombre, $descripcion, $marca, $categoria)
    {
        if (Session::userIsLoggedIn()) {

            if(!$nombre || !$descripcion || !$marca || !$categoria) {
                header('Location: /productos/listar');
            }

            if ($nombre && $descripcion && $marca && $categoria) {

                if (! $_POST) {
                    $datos = ['nombre' => trim(str_replace('%20', ' ', $nombre)),
                        'descripcion' => trim(str_replace('%20', ' ', $descripcion)),
                        'marca' => trim(str_replace('%20', ' ', $marca)),
                        'categoria_id' => trim(str_replace('%20', ' ', $categoria))];

                    echo $this->view->render('productos/formularioProducto', [
                        'datos' => $datos
                    ]);
                } else {

                    echo 'Se ha enviado ya';

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

        if (Session::userIsLoggedIn()) {

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