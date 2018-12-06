<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/12/18
 * Time: 22:06
 */

namespace Mini\Core;


class Validation
{
    public static function Validar($datos)
    {
        $errores_validacion = false;
        $value = 'feedback_negative';
        $form = 'form';

        if ( empty($datos['nombre']) || ! isset($datos['nombre'])) {
            Session::addAsoc('feedback_negative', 'nombre','No he recibido el nombre del usuario');
            $errores_validacion = true;
        } elseif (strlen($datos['nombre']) < 3 ) {
            Session::addAsoc('feedback_negative', 'nombre','Campo nombre demasiado corto');
            $errores_validacion = true;
        } else {
            Session::set($form, $key = $datos['nombre']);
            Session::vaciar($value, 'nombre');
        }

        if ( empty($datos['apellidos']) || ! isset($datos['apellidos'])) {
            Session::addAsoc('feedback_negative', 'apellidos', 'No he recibido los apellidos del usuario');
            $errores_validacion = true;
        } elseif (strlen($datos['apellidos']) < 3 ) {
            Session::addAsoc('feedback_negative', 'apellidos','Campo apellido demasiado corto');
            $errores_validacion = true;
        } else {
            Session::set($form, $key = $datos['apellidos']);
            Session::vaciar($value, 'apellidos');
        }

        if ( empty($datos['email']) || ! isset($datos['email'])) {
            Session::addAsoc('feedback_negative', 'email', 'No he recibido el email del usuario');
            $errores_validacion = true;
        } elseif (strlen($datos['email']) < 6 ) {
            Session::addAsoc('feedback_negative', 'email','Campo email no inválido');
            $errores_validacion = true;
        } else {
            Session::set($form, $key = $datos['email']);
            Session::vaciar($value, 'email');
        }

        if ( empty($datos['nickname']) || ! isset($datos['nickname'])) {
            Session::addAsoc('feedback_negative', 'nickname', 'No he recibido el nickname del usuario');
            $errores_validacion = true;
        } elseif (strlen($datos['nickname']) < 3 ) {
            Session::addAsoc('feedback_negative', 'nickname','Campo nickname demasiado corto');
            $errores_validacion = true;
        } else {
            Session::set($form, $key = $datos['nickname']);
            Session::vaciar($value, 'nickname');
        }

        if ( empty($datos['cargo']) || ! isset($datos['cargo'])) {
            Session::addAsoc('feedback_negative', 'cargo', 'No he recibido el cargo del usuario');
            $errores_validacion = true;
        } else {
            Session::set($form, $key = $datos['cargo']);
            Session::vaciar($value, 'cargo');
        }

        if ( empty($datos['clave']) ) {
            Session::addAsoc('feedback_negative', 'clave', 'No he recibido la clave del usuario');
            $errores_validacion = true;
        } elseif (strlen($datos['clave']) < 6 ) {
            Session::addAsoc('feedback_negative', 'clave','La clave debe tener al menos, 6 caracteres');
            $errores_validacion = true;
        } elseif (!preg_match('`[a-z]`', $datos['clave'])){
            Session::addAsoc('feedback_negative', 'clave','La clave debe tener al menos una letra minúscula');
            $errores_validacion = true;
        } elseif (!preg_match('`[A-Z]`', $datos['clave'])){
            Session::addAsoc('feedback_negative', 'clave','La clave debe tener al menos una letra mayúscula');
            $errores_validacion = true;
        } elseif (!preg_match('`[0-9]`', $datos['clave'])){
            Session::addAsoc('feedback_negative', 'clave','La clave debe tener al menos un caracter numérico');
            $errores_validacion = true;
        } elseif ($datos['clave'] != $datos['clave2']) {
            Session::addAsoc('feedback_negative', 'clave','Las claves tienen que ser iguales');
            $errores_validacion = true;
        } else {
            Session::vaciar($value, 'clave');
        }

        if ( $errores_validacion ) {
            return false;
        }

        return true;
    }
}