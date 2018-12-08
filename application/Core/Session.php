<?php

namespace Mini\Core;

class Session
{
    public static function init()
    {
        if ( ! session_id() ) {
            session_start();
        }
    }
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function get($key = 'user')
    {
        if ( isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }
    public static function add($key, $value)
    {
        $_SESSION[$key][] = $value;
    }
    public static function addAsoc($key, $name, $value)
    {
        $_SESSION[$key][$name] = $value;
    }
    public static function destroy()
    {
        session_destroy();
    }
    public static function vaciar($value, $element)
    {
        unset($_SESSION[$value][$element]);
    }
    public static function userIsLoggedIn($user = 'user')
    {
        return (Session::get($user) ? true : false);
    }
    public static function jefeIsLoggedIn()
    {
        if (Session::get()[0]->rol == 'jefe') {
            return true;
        }
        return false;
    }
}