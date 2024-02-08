<?php

namespace App\Controllers;

class Controller
{
  public $layout;

  public function __construct()
  {
    $this->layout = 'site';
  }

  /**
   * Render the view for the controller
   * @param string $viewFile
   * @param array $data
   */
  public function view($viewFile = 'index', $data = [])
  {
    extract($data);
    $viewPath             = $this->getViewPath($viewFile);
    $includePathForLayout = $viewPath;
    include $this->getLayout();
  }

  /**
   * Get the layout for the controller
   */
  private function getLayout()
  {
    $layoutPath = 'views/layouts/' . $this->layout . '.php';

    if (!file_exists($layoutPath)) {
      die("Error: Layout file '{$this->layout}.php' not found.");
    }

    return $layoutPath;
  }

  /**
   * Get the the view file path 
   * @param string $viewFile
   */
  private function getViewPath($viewFile = 'index')
  {
    $controllerPath = $this->getViewPathForController();
    $fullPath       = $this->viewsDir() . '/' . $controllerPath . '/' . $viewFile . '.php';
    return $fullPath;
  }

  /**
   * Get the view directory path for the controller
   */
  private function getViewPathForController()
  {
    $classParts = explode('\\', get_class($this));
    $classParts = array_reverse($classParts);
    $className  = str_replace('Controller', '', $classParts[0]);
    $className  = strtolower($className);
    return $className;
  }

  /**
   * Views directory for the app
   */
  private function viewsDir()
  {
    return 'views';
  }

  public function __call($method, $args)
  {
    if (!method_exists($this, $method)) {
      echo sprintf("Method %s not found in the %s class", $method, get_class($this));
    }
  }
}
