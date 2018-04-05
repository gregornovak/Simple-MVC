<?php

namespace Gregor\Core;

class Session
{
    public $session;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function flash(string $message) : void
    {
        if(!empty($message)) {
            self::set('flashMessage', $message);
        }
    }

    public static function has(string $session) : bool
    {
        return self::get($session) ? true : false;
    }

    public static function getMessage() : string
    {
        $message = '';

        if(!empty(self::get('flashMessage'))) {
            $message = self::get('flashMessage');
            self::unset('flashMessage');
            return $message;
        }

        return $message;
    }

    private static function get(string $session)
    {
        if(!empty($_SESSION[$session])) {
            return $_SESSION[$session];
        }

        return null;
    }

    private static function set(string $session, string $value) : void
    {
        if(!empty($session) && !empty($value)) {
            $_SESSION[$session] = $value;
        }
    }

    private static function unset(string $session) : void
    {
        if(!empty($session)) {
            unset($_SESSION[$session]);
        }
    }
}