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
            $ssql = "SELECT * FROM usuarios WHERE clave = '" . $clave . "'";
            $query = $conn->prepare($ssql);
            $query->execute();
            $cuenta = $query->rowCount();
            $query = $query->fetchAll();

            if( $cuenta == 1 ) {
                Session::set('user', $query);
                return true;
            } else {
                Session::set('pass', 'La contraseña es incorrecta');
                return false;
            }

        } else {
            Session::set('pass', 'El param no existe en la base de datos');
            return false;
        }

    }

    public function insert($datos)
    {

        $conn = Database::getInstance()->getDatabase();
        $errores_validacion = false;

        if ( empty($datos['nombre']) ) {
            Session::add('feedback_negative', 'No he recibido el nombre del usuario');
            $errores_validacion = true;
        }

        if ( empty($datos['apellidos'])) {
            Session::add('feedback_negative', 'No he recibido los apellidos del usuario');
            $errores_validacion = true;
        }

        if ( empty($datos['email'])) {
            Session::add('feedback_negative', 'No he recibido el email del usuario');
            $errores_validacion = true;
        }

        if ( empty($datos['nickname'])) {
            Session::add('feedback_negative', 'No he recibido el nickname del usuario');
            $errores_validacion = true;
        }

        if ( empty($datos['cargo'])) {
            Session::add('feedback_negative', 'No he recibido el cargo del usuario');
            $errores_validacion = true;
        }

        if ( empty($datos['clave'])) {
            Session::add('feedback_negative', 'No he recibido la clave del usuario');
            $errores_validacion = true;
        }

        if ( $errores_validacion ) {
            //echo 'HAY errores. false';
            return false;
        }

        $params = [
            'nombre' => $datos['nombre'],
            'apellidos' => $datos['apellidos'],
            'email' => $datos['email'],
            'nickname' => $datos['nickname'],
            'clave' => $datos['clave'],
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