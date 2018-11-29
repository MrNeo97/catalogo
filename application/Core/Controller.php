<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 22/11/18
 * Time: 17:08
 */

namespace Mini\Core;

use Mini\Core\TemplatesFactory;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = TemplatesFactory::templates();
        //Session::init();
    }
}