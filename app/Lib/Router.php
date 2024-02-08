<?php 

namespace App\Lib;

class Router
{
  private $server;

  public function __construct()
  {
    $this->server = $_SERVER;
  }

  /**
   * Host name without protocol scheme
   * @return string
   */
  public function hostName()
  {
    return $this->server['HTTP_HOST'];
  }

  /**
   * Server request scheme
   * @return string 
   */
  public function serverScheme()
  {
    return $this->server['REQUEST_SCHEME'];
  }

  /**
   * Host name with protocol scheme
   * @return string 
   */
  public function host()
  {
    $hostName = $this->hostName();
    $scheme   = $this->serverScheme();
    $host     = $scheme . '://' . $hostName;
    return $host;
  }

  /**
   * Request URI
   * @return string 
   */
  public function requestUri()
  {
    return $this->server['REQUEST_URI'];
  }

  /**
   * Get the route after the app url
   * @return string
   */
  private function extraRoute()
  {
    $extraRoute = str_replace(APP_URL, '', $this->host() . $this->requestUri());
    return $extraRoute;
  }

  /**
   * Controller namespace configuration
   * @return string 
   */
  private function controllerNamespace() 
  {
    return 'App\Controllers\\';
  }

  /**
   * Controller suffix for controllers, like 'Home' to 'HomeController'
   * @return string 
   */
  private function controllerSuffix() 
  {
    return 'Controller';
  }
  
  /**
   * Get the controller name with 'Controller' suffix
   * @return string 
   */
  public function controller()
  {
    $route = @explode('/', trim($this->extraRoute(), '/'))[0];
    $controller = null;

    if ('' == $route || 'index.php' == $route) {
      $controller = $this->controllerNamespace() . DEFAULT_CONTROLLER;
    } else {
      $controller = $this->controllerNamespace() . ucfirst($route);
    }

    $controller = str_replace('?'.$this->queryStrings(), '', $controller);
    $controller = $controller . $this->controllerSuffix();
    
    return $controller;
  }

  /**
   * Get the query strings from the url
   */
  public function queryStrings() 
  {
    $queryString = $_SERVER['QUERY_STRING'];
    return $queryString;
  }
  
  /**
   * Get the method name for the controller
   * It's being returned in lowercase
   * @return string 
   */
  public function method()
  {
    $route = @explode('/', trim($this->extraRoute(), '/'))[1];

    if (is_null($route) || '' == $route ) {
      return DEFAULT_METHOD;
    }

    $methodWithParams    = str_replace('.php', '', $route);
    $methodWithoutParams = str_replace('?' . $this->queryStrings(), '', $methodWithParams);
    return strtolower($methodWithoutParams);
  }
}
