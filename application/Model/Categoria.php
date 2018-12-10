<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/12/18
 * Time: 11:05
 */

namespace Mini\Model;

use Mini\Core\Database;

class Categoria
{
    public static function buscar($param, $value)
    {

        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM categorias WHERE " . $param . "='" . $value ."'";
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();

    }
}