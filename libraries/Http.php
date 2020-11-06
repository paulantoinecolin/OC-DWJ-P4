<?php

// Here we can get and use HTTP requests to make redirections...
class Http
{
    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }
}
