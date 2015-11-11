<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'calculadora_home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/calculadora/',
                    'defaults' => array(
                        'controller' => 'Calculadora\Controller\Calculadora',
                        'action' => 'index',
                    ),
                ),
            ),
            'calculadora_add' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/calculadora/add/',
                    'defaults' => array(
                        'controller' => 'Calculadora\Controller\Calculadora',
                        'action' => 'add',
                    ),
                ),
            ),
            'calculadora_addDo' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/calculadora/add-do/',
                    'defaults' => array(
                        'controller' => 'Calculadora\Controller\Calculadora',
                        'action' => 'addDo',
                    ),
                ),
            ),
            'calculadora_substrat' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/calculadora/substrat/',
                    'defaults' => array(
                        'controller' => 'Calculadora\Controller\Calculadora',
                        'action' => 'add',
                    ),
                ),
            ),
            'calculadora_multiply' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/calculadora/multiply/',
                    'defaults' => array(
                        'controller' => 'Calculadora\Controller\Calculadora',
                        'action' => 'add',
                    ),
                ),
            ),
            'calculadora_division' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/calculadora/division/',
                    'defaults' => array(
                        'controller' => 'Calculadora\Controller\Calculadora',
                        'action' => 'add',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'Calculadora\Model\Calculadora' => 'Calculadora\Model\CalculadoraModel',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            //'Calculadora\Controller\Calculadora' => 'Calculadora\Controller\CalculadoraController',
        ),
        'factories' => array(
            'Calculadora\Controller\Calculadora' =>
                'Calculadora\Controller\Factory\CalculadoraControllerFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
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
