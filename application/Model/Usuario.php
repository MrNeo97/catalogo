<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29/11/18
 * Time: 18:32
 */

namespace Mini\Model;

use Mini\Core\Database;
use Mini\Core\Session;
use Mini\Core\Validation;

class Usuario
{
    public function comprueba($user, $clave, $param)
    {
        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM usuarios WHERE " . $param ." = '" . $user . "'";
        $query = $conn->prepare($ssql);
        $query->execute();

        if( $query->fetchAll() ) {
            $conn = Database::getInstance()->getDatabase();
            $ssql = "SELECT * FROM usuarios WHERE clave = '" . $clave . "' AND " . $param . " = '" . $user . "'";
            $query = $conn->prepare($ssql);
            $query->execute();
            $cuenta = $query->rowCount();
            $query = $query->fetchAll();
            var_dump($query);

            if( $cuenta == 1 ) {
                Session::set('user', $query);
                return true;
            } else {
                Session::set('errorPass', 'La contraseña es incorrecta');
                return true;
            }

        } else {
            Session::set('errorUser', 'El ' . $param . ' no existe en la base de datos');
            return true;
        }

    }

    public function insert($datos)
    {

        $conn = Database::getInstance()->getDatabase();

        if(Validation::Validar($datos)) {

            $params = [
                'nombre' => $datos['nombre'],
                'apellidos' => $datos['apellidos'],
                'email' => $datos['email'],
                'nickname' => $datos['nickname'],
                'clave' => md5($datos['clave']),
                'rol' => $datos['cargo']
            ];

            $fields = '(' . implode(',', array_keys($params)) . ')';

            $values = "(:" . implode(",:", array_keys($params)) . ")";

            $ssql = 'INSERT INTO usuarios ' . $fields . ' VALUES ' . $values;
            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();

            if ($cuenta == 1) {
                return $conn->lastInsertId();
            }

            return false;
        }


    }
}