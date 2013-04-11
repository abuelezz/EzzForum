<?php
//kapitchi
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

    public function getControllerConfig() {

        return array(
            'factories' => array(
                'EzzForum\Controller\Post' => function($sm) {
                    $cont = new Controller\PostController();
                    $cont->setPostForm($sm->getServiceLocator()->get('EzzForum\Form\Post'));
                    $cont->setEntityService($sm->getServiceLocator()->get('EzzForum\Service\Post'));
                    return $cont;
                }
            )
        );
    }

    public function getServiceConfig() {
        return array(
            
            'invokables' => array(
                //entities
                'EzzForum\Entity\Post' => 'EzzForum\Entity\Post',
            ),            
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
                'EzzForum\Mapper\Post' => function ($sm) {
                    $mapper = new Mapper\Post(                            
                            $sm->get('Zend\Db\Adapter\Adapter'), new Mapper\PostDbAdapterMapperOptions(array(
                            'tableName' => 'post',
                            ))                    
                    );
                    $mapper->setEntityPrototype($sm->get('EzzForum\Entity\Post'));
                    $mapper->setHydrator($sm->get('EzzForum\Entity\PostHydrator'));
                    return $mapper;
                },
                        
                'EzzForum\Entity\PostHydrator' => function ($sm) {                    
                    return new Entity\PostHydrator(false);
                },
                        
                'EzzForum\Service\Post' => function ($sm) {
                    $s = new Service\Post(
                        $sm->get('EzzForum\Mapper\Post'),
                        $sm->get('EzzForum\Entity\Post'),
                        $sm->get('EzzForum\Entity\PostHydrator')
                    );
                    return $s;
                }                        
            )
        );
    }

}
