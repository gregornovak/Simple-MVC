<?php

namespace Gregor\Core;

/**
 * Returns the required view
 */
class View
{
    /** @var string The path to the views  folder */
    private $view = VIEWS . DS;

    /**
     * Return the appropriate view or return an exception if it is not found
     * 
     * @param string $pathToFile is supplied by folder.file convention. Sample: index.test
     * @return void
     */
    public function __construct(string $pathTofile, array $data = [])
    {
        $exploded  = explode('.', $pathTofile);
        $directory = $exploded[0];
        $file      = $exploded[1];

        $this->view .= lcfirst($directory) . DS . $file . '.php';
        if(!file_exists($this->view)) {
            throw new \Exception("The view with this controller and method does not exist!");
        }

        // $data = $data;

        require_once $this->view;
    }
}