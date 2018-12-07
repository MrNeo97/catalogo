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

class Producto
{

    public function getAll()
    {

        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM productos";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();

    }

    public static function insert($datos)
    {

        $conn = Database::getInstance()->getDatabase();

        $validacion = new Validation();

        if($validacion->validarProducto($datos)) {

            $params = [
                'nombre' => $datos['nombre'],
                'descripcion' => $datos['descripcion'],
                'fecha_alta' => $datos['fecha_alta'],
                'marca' => $datos['marca'],
                'usuario_id' => $datos['usuario_id'],
                'categoria_id' => $datos['categoria_id']
            ];

            $fields = '(' . implode(',', array_keys($params)) . ')';

            $values = "(:" . implode(",:", array_keys($params)) . ")";

            $ssql = 'INSERT INTO productos ' . $fields . ' VALUES ' . $values;
            $query = $conn->prepare($ssql);
            $query->execute($params);
            $cuenta = $query->rowCount();

            if ($cuenta == 1) {
                return $conn->lastInsertId();
            }

            return false;
        }

    }

    public static function getId($id)
    {

        $conn = Database::getInstance()->getDatabase();
        $id = (int) $id;

        if ($id == 0) {
            return false;
        }

        $ssql = "SELECT * FROM preguntas WHERE id=:id";
        $query = $conn->prepare($ssql);
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetch();

    }

    public static function edit($datos)
    {

        $conn = Database::getInstance()->getDatabase();
        $errores_validacion = false;

        if (empty($datos['id'])) {
            Session::add('feedback_negative','No he recibido la pregunta');
            $errores_validacion = true;
        }

        if (empty($datos['asunto'])) {
            Session::add('feedback_negative', 'No he recibido el asunto de la pregunta');
            $errores_validacion = true;
        }

        if (empty($datos['cuerpo'])) {
            Session::add('feedback_negative', 'No he recibido el cuerpo de la pregunta');
            $errores_validacion = true;
        }

        if ($errores_validacion) return false;
        $datos['id'] = (int) $datos['id'];
        $ssql = "UPDATE preguntas SET asunto=:asunto, cuerpo=:cuerpo WHERE id=:id";
        $query = $conn->prepare($ssql);
        $params = [
            ':asunto' => $datos['asunto'],
            ':cuerpo' => $datos['cuerpo'],
            ':id'	  => $datos['id']
        ];

        $query->execute($params);
        $count = $query->rowCount();

        if ($count == 1) {
            return true;
        }

        return false;
    }

    public function eliminar($id)
    {
        $conn = Database::getInstance()->getDatabase();

        $ssql = "DELETE FROM productos WHERE id = " . $id;
        $query = $conn->prepare($ssql);
        $query->execute();

        $count = $query->rowCount();

        if ($count == 1) {
            return true;
        }

        return false;

    }
}