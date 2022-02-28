<?php

namespace Eclair\Routing;

use Eclair\Routing\RequestContext;
use Eclair\Http\Request;

class Route {
    private static $context = [];

    public static function add($method, $path, $handler, $middlewares = []) {
        self::$context[] = new RequestContext($method, $path, $handler, $middlewares);
    }

    
    public static function run() {
        foreach(self::$context as $context) {
            if($context->method === strtolower(Request::getMethod()) && is_array($url_Params = $context->match(Request::getPath()))) {
                if ($context->runMiddleware()) {
                    return \call_user_func($context->handler, ...$url_Params);
                }
                return false;
            }
        }
    }
}

?>