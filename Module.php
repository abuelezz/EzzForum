<?php

namespace EzzForum;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;

class Module implements AutoloaderProviderInterface {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/', __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    /*
     * I tried to use as the same that you did in contact form, but I cannot complete :( 
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'EzzForum\Form\Post' => function ($sm) {
                    $form = new Form\PostForm('post');
                    $form->setInputFilter($sm->get('EzzForum\Form\PostInputFilter'));
                    return $form;
                },
                'EzzForum\Form\PostInputFilter' => function ($sm) {
                    $filter = new Form\PostInputFilter();
                    return $filter;
                },
            )
        );
    }
    */

}
