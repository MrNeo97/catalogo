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
    public static function destroy()
    {
        session_destroy();
    }
    public static function userIsLoggedIn($user = 'user')
    {
        return (Session::get($user) ? true : false);
    }
}