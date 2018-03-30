<?php

namespace Gregor\Core;

use Gregor\Core\Error;


/**
 * Is used for managing and initializing objects and methods.
 */
class Controller
{
    /** @var string $controllerNamespace Default base namespace */
    protected $controllerNamespace = '\Gregor\Controllers';
    /** @var string $controller Default controller if none is specified */
    protected $controller          = 'Index';
    /** @var string $method Default method if none is specified */
    protected $method              = 'index';
    /** @var null $queryParameter Query parameters is set to null */
    protected $queryParameter      = null;
    /** @var null $db Instance of the database */
    protected $db = null;

    public function __construct()
    {
        $namespace = $this->getAction($_SERVER['REQUEST_URI']);
        
        if(!class_exists($namespace)) {
            return new Error('errors.not-found', 'This class does not exist!');
        }

        $controller = new $namespace();
        
        if(!method_exists($controller, $this->getMethod())) {
            $class = $this->getController() . 'Controller';
            return new Error('errors.not-found', "This method in class $class does not exist!");
        }
        
        if($this->getParam() != null) {
            $controller->{$this->getMethod()}($this->getParam());        
        } else {
            $controller->{$this->getMethod()}();
        }
    }

    /**
     * Creates the namespace from the provided url.
     * 
     * @param string $url 
     * @return string $namespace
     */
    protected function getAction(string $url) : string
    {
        // array_filter returns value if the inner function returns true
        // since explode returns an empty string for the first element i used array_filter
        // to unset values with empty strings example: string ""
        
        $exploded = array_values(array_filter(explode('/', $url)));
        
        if(!empty($exploded[0]) && isset($exploded[0])) {
            $this->setController(ucfirst($exploded[0]));
        }
        
        if(!empty($exploded[1]) && isset($exploded[1])) {
            $this->setMethod($exploded[1]);
        }

        if(!empty($exploded[2]) && isset($exploded[2])) {
            $this->setParam($exploded[2]);
        }

        $namespace = "{$this->getControllersNamespace()}\\{$this->getController()}Controller";

        return $namespace;
    }

    public function getController() : string
    {
        return $this->controller;
    }

    public function getMethod() : string
    {
        return $this->method;
    }

    public function getParam()
    {
        return $this->queryParameter;
    }

    public function getControllersNamespace() : string
    {
        return $this->controllerNamespace;
    }

    public function setController(string $controller) : void
    {
        $this->controller = $controller;
    }

    public function setMethod(string $method) : void
    {
        $this->method = $method;
    }

    public function setParam($param) : void
    {
        $this->queryParameter = $param;
    }

    public function __toString()
    {
        return $this->getController();
    }

}