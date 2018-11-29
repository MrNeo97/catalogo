<?php

namespace Mini\Core;

use League\Plates\Engine;


class TemplatesFactory
{
    private static $templates;

    public static function templates()
    {
        if ( ! TemplatesFactory::$templates) {

            //Aqui le digo la ruta desde donde van a comenzar todas las vistas
            TemplatesFactory::$templates = new Engine(APP . 'view');
            TemplatesFactory::$templates->addData(['titulo' => 'Catálogo']);

        }

        return TemplatesFactory::$templates;
    }
}