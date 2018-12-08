<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/12/18
 * Time: 11:43
 */

namespace Mini\Controller;


use Mini\Core\Controller;
use Mini\Model\Usuario;
use Mini\Core\Session;


class LoginController extends Controller
{
    private $titulo;

    public function __construct()
    {
        parent::__construct();
        $this->titulo = 'Productos';
    }

    public function index()
    {

       if (isset($_POST['parametro']) && $_POST['parametro'] == 'mail') {

           $user = strtolower($_POST['user']);
           $clave = $_POST['clave'];
           $param = 'email';

           $clave = md5($clave);

           $usuario = new Usuario;

           $usuario->comprueba($user, $clave, $param);

           if (Session::userIsLoggedIn()) {

               header('Location: /');

           } else {
               if (Session::get('errorPass')) {
                   $errorP = Session::get('errorPass');
                   echo $this->view->render('login/formulariologin', ['errorPass' => $errorP]);
                   Session::destroy();
               } else {
                   $errorU = Session::get('errorUser');
                   echo $this->view->render('login/formulariologin', ['errorUser' => $errorU]);
                   Session::destroy();
               }
           }

       } else if (isset($_POST['parametro']) && $_POST['parametro'] == 'nickname') {

           $user = strtolower($_POST['user']);
           $clave = $_POST['clave'];
           $param = 'nickname';

           $clave = md5($clave);

           $usuario = new Usuario;

           $usuario->comprueba($user, $clave, $param);

           if (Session::userIsLoggedIn()) {

               header('Location: /');

           } else {
               if (Session::get('errorPass')) {
                   $errorP = Session::get('errorPass');
                   echo $this->view->render('login/formulariologin', ['errorPass' => $errorP]);
                   Session::destroy();
               } else {
                   $errorU = Session::get('errorUser');
                   echo $this->view->render('login/formulariologin', ['errorUser' => $errorU]);
                   Session::destroy();
               }
           }


        } else {

           echo $this->view->render('login/formulariologin');

       }

    }

    public function registro()
    {
        if (Session::userIsLoggedIn() && Session::jefeIsLoggedIn()) {

            if ($_POST) {
                $datos = array("nombre" => filter_var(trim(strtolower($_POST['nombre'])), FILTER_SANITIZE_STRING),
                    "apellidos" => filter_var(trim(strtolower($_POST['apellidos'])), FILTER_SANITIZE_STRING),
                    "email" => filter_var(trim(strtolower($_POST['email'])), FILTER_SANITIZE_STRING),
                    "nickname" => filter_var(trim(strtolower($_POST['nickname'])), FILTER_SANITIZE_STRING),
                    "cargo" => filter_var(trim(strtolower($_POST['cargo'])), FILTER_SANITIZE_STRING),
                    "clave" => $_POST['clave1'],
                    "clave2" => $_POST['clave2']
                );

                $usuario = new Usuario;

                $errores = [];

                if ($usuario->insert($datos)) {
                    echo $this->view->render('login/usuarioregistrado');
                } else {
                    if (!is_null(Session::get('feedback_negative')) ) {
                        $errores = Session::get('feedback_negative');
                    }

                    echo $this->view->render('login/formularioregistro', [
                        'errores' => $errores,
                        'datos' => $datos
                    ]);
                }


            } else {

                $this->view->addData(['titulo' => 'Crear Trabajador']);
                echo $this->view->render('login/formularioregistro');
            }
        } else {
            header('Location: /login');
        }
    }

    public function cerrarSesion()
    {
        Session::destroy();
        header('Location: /');
    }

}