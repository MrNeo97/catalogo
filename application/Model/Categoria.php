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
    public static function getCategoria($categoria_id)
    {

        $conn = Database::getInstance()->getDatabase();
        $ssql = "SELECT * FROM categorias WHERE id = " . $categoria_id;
        $query = $conn->prepare($ssql);
        $query->execute();
        return $query->fetchAll();

    }
}