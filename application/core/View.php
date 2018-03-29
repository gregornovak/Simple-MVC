<?php

namespace Gregor\Core;

/**
 * Returns the required view
 */
class View
{
    /** @var string The path to the views  folder */
    private $view = '';
    private $loader = null;
    private $twig = null;

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

        $this->view .= lcfirst($directory) . DS . $file . '.html.twig';
        
        $this->loader = new \Twig_Loader_Filesystem(VIEWS);
        $this->twig = new \Twig_Environment($this->loader);
        $data['year'] = date('Y');

        echo $this->twig->render($this->view, $data);
    }
}