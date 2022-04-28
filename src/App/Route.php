<?php
    namespace App;
    class Route {
        static $pages = [];
        static function __callStatic($name, $arg) {
            if(strtolower($_SERVER['REQUEST_METHOD']) == $name) self::$pages[] = $arg;
        }

        static function start() {
            $curUrl = explode("?", $_SERVER['REQUEST_URI'])[0];
            foreach(self::$pages as $page) {
                $url = $page[0];
                $action = explode("@", $page[1]);
                $regex = preg_replace("/({[^\/]+})/", "([^/]+)", $url);
                $regex = preg_replace("/\//", "\\/", $regex);

                if(preg_match("/^{$regex}$/", $curUrl, $matches)) {
                    unset($matches[0]);

                    $conName = "Controller\\{$action[0]}";
                    $con = new $conName();
                    $con->{$action[1]}(...$matches);
                    exit;
                }
            }
        }
    }