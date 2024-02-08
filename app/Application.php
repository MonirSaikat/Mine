<?php

namespace App;

use App\Lib\Router;

class Application
{
  public const VERSION = '1.0.0';
  
  public function run()
  {
    $router     = new Router();
    $controller = $router->controller();
    $method     = $router->method();

    (new $controller)->$method();
  }
}
