<?php
namespace Livrairia;
return array(
    'router' => array(
        'routes' => array(
            'Livraria-home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/Livraria',
                    'defaults' => array(
                        'controller' => 'Livraria\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            'livraria-admin' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/admin/[:controller[/:action]/page/:page]',
                    'defaults' => array(
                        'action' => 'index',
                        'page' => 1
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'Livraria\Controller\Index' => 'Livraria\Controller\IndexController',
            'categorias' => 'LivrariaAdmin\Controller\CategoriasController'
            ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'Livraria/index/index' => __DIR__ . '/../view/Livraria/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
            'factories' => array(
                'Zend\Db\Adapter\Adapter'=> 'Zend\Db\Adapter\AdapterServiceFactory'
            )
        ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . 'driver' =>array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' =>array(__DIR__ . '/../src/'. __NAMESPACE__ .'/Entity')
                
                    
                ),
            'orm_default' => array(
                'drivers' => array(
                     __NAMESPACE__ .'\Entity' =>  __NAMESPACE__ . 'driver'
               ),
           ),
       ), 
   ),
);
