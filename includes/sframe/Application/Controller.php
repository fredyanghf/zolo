<?php
/**
 * Controller
 *
 * @package Application
 * @author fredyang
 * @version $Id$
 */

abstract class SF_Application_Controller
{
    /**
     * @var \SF_Router
     */
    public $router = null;
    
    
    public function __construct(SF_Router $router)
    {
        $this->router = $router;
    }
    
    
    public function init()
    {
    }
    
    public function render($template, $vals = array())
    {
        $this->getView()->render($template, $vals);
    }
    
    public function getView()
    {
        static $view = null;
        if (null === $view) {
            $view = SF_Application::getView();
        }
        return $view;
    }
}