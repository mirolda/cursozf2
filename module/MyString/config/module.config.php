<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'MyString' => array(
        'prefix' => 10,
    ),
    'applicationMyString' => array(
        'name'=> 'MyString App',
    ),
    'router' => array(
        'routes' => array(
            'my-string_home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/my-string/',
                    'defaults' => array(
                        'controller' => 'MyString\Controller\MyString',
                        'action'     => 'index',
                    ),
                ),
            ),
            'MyString_MyString_Concatenar' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/my-string/concatenar/',
                    'defaults' => array(
                        'controller' => 'MyString\Controller\MyString',
                        'action' => 'concatenar',
                    ),
                ),
            ),
            'MyString_MyString_ConcatenarDo' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/my-string/concatenar-do/',
                    'defaults' => array(
                        'controller' => 'MyString\Controller\MyString',
                        'action' => 'concatenarDo',
                    ),
                ),
            ),
            'MyString_MyString_Subcadena' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/my-string/subcadena/',
                    'defaults' => array(
                        'controller' => 'MyString\Controller\MyString',
                        'action' => 'subcadena',
                    ),
                ),
            ),
            'MyString_MyString_SubcadenaDo' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/my-string/subcadena-do/',
                    'defaults' => array(
                        'controller' => 'MyString\Controller\MyString',
                        'action' => 'subcadenaDo',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'MyString\Model\MyString' => 'MyString\Model\MyStringModel',
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            //'MyString\Controller\Index' => 'MyString\Controller\IndexController'
        ),
        'factories' => array(
            'MyString\Controller\MyString' =>
                'MyString\Controller\Factory\MyStringControllerFactory',
        ),
    ),
    'controller_plugins' => array(
        'factories' => array(
            'AddPrefix' => 'MyString\Controller\Plugin\Factory\AddPrefixPluginFactory',
        ),
    ),

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'             => __DIR__ . '/../view/layout/layout.phtml',
            'my-string/layout/header'  => __DIR__ . '/../view/layout/header.phtml',
            'my-string/layout/footer'  => __DIR__ . '/../view/layout/footer.phtml',
            'my-string/partial/menu'   => __DIR__ . '/../view/my-string/my-string/partial/menu.phtml',
        ),
     //   'template_map' => array(
      //      'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
       //     'my-string/index/index' => __DIR__ . '/../view/my-string/index/index.phtml',
       //     'error/404'               => __DIR__ . '/../view/error/404.phtml',
       //     'error/index'             => __DIR__ . '/../view/error/index.phtml',
       // ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'formHelper' => 'MyString\View\Helper\FormHelper',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
