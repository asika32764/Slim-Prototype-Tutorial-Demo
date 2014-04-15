<?php

namespace View;

use Slim\View as SlimView;

class Twig extends SlimView
{
    protected $twig;
    
    /**
     * Get Twig Engine.
     */
    public function getTwig()
    {
        if($this->twig)
        {
            return $this->twig;
        }
        
        $loader = new \Twig_Loader_Filesystem($this->getTemplatesDirectory());
        
        $twig = new \Twig_Environment($loader);
        
        return $this->twig = $twig;
    }
    
    /**
     * Render a template file
     *
     * NOTE: This method should be overridden by custom view subclasses
     *
     * @var    string $template     The template pathname, relative to the template base directory
     * @return string               The rendered template
     * @throws \RuntimeException    If resolved template pathname is not a valid file
     */
    public function render($template)
    {
        $twig = $this->getTwig();
        
        return $twig->render($template, $this->data->all());
    }
}