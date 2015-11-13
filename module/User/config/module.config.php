<?php
return array(
    'router' => array(
        'routes' => array(
            'user\account\index' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/account/',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'index',
                    ),
                ),
            ),
            'user\account\view' => array(
                'type'              => 'Segment',
                'options'           => array(
                    'route'         => '/account/view/id/[:id]/',
                    'constraints'   => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'view',
                    ),
                ),
            ),
            'user\account\create' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/account/create/',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'create',
                    ),
                ),
            ),
            'user\account\doCreate' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/account/do-create/',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'doCreate',
                    ),
                ),
            ),
            'user\account\delete' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/account/delete/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'delete',
                    ),
                ),
            ),
            'user\account\update' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/account/update/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'update',
                    ),
                ),
            ),
            'user\account\doUpdate' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/account/do-update/',
                    'defaults' => array(
                        'controller' => 'User\Controller\User',
                        'action'     => 'doUpdate',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'User\Model\UserDao'   => 'User\Model\Factory\UserDaoFactory',
            'User\Model\UserDaoTableGateway' => 'User\Model\Factory\UserDaoTableGatewayFactory',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            //'User\Controller\User' => 'User\Controller\Factory\UserControllerFactory',
            'User\Controller\User' => 'User\Controller\Factory\UserControllerTableGatewayFactory',
        ),
    ),
    'view_manager' => array(
        'template_map'              => array(
            'user/account/partial/form' => __DIR__ . '/../view/user/account/partial/form.phtml',
        ),
        'template_path_stack'       => array(
            __DIR__ . '/../view',
        ),
    ),
);
