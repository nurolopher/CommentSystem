<?php

class TokenHandler
{
    public static function isValidToken()
    {
        if (!empty($_POST['token'])) {
            return (hash_equals($_POST['token'], $_SESSION['token']));
        }
        return false;
    }
}