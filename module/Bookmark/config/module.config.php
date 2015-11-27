<?php
return array(
    'router' => array(
        'routes' => array(
            'bookmark\account\index' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/bookmark/',
                    'defaults' => array(
                        'controller' => 'Bookmark\Controller\Bookmark',
                        'action'     => 'index',
                        'roles'      => ['admin', 'user'],
                    ),
                ),
            ),
            'bookmark\account\view' => array(
                'type'              => 'Segment',
                'options'           => array(
                    'route'         => '/bookmark/view/id/[:id]/',
                    'constraints'   => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Bookmark\Controller\Bookmark',
                        'action'     => 'view',
                        'roles'      => ['admin', 'user'],
                    ),
                ),
            ),
            'bookmark\account\create' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/bookmark/create/',
                    'defaults' => array(
                        'controller' => 'Bookmark\Controller\Bookmark',
                        'action'     => 'create',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
            'bookmark\account\doCreate' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/bookmark/do-create/',
                    'defaults' => array(
                        'controller' => 'Bookmark\Controller\Bookmark',
                        'action'     => 'doCreate',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
            'bookmark\account\delete' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/bookmark/delete/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Bookmark\Controller\Bookmark',
                        'action'     => 'delete',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
            'bookmark\account\update' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/bookmark/update/id/[:id]/',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Bookmark\Controller\Bookmark',
                        'action'     => 'update',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
            'bookmark\account\doUpdate' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/bookmark/do-update/',
                    'defaults' => array(
                        'controller' => 'Bookmark\Controller\Bookmark',
                        'action'     => 'doUpdate',
                        'roles'      => ['admin'],
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Bookmark\Model\BookmarkDao'   => 'Bookmark\Model\Factory\BookmarkDaoFactory',
            'Bookmark\Model\BookmarkDaoTableGateway' => 'Bookmark\Model\Factory\BookmarkDaoTableGatewayFactory',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Bookmark\Controller\Bookmark' => 'Bookmark\Controller\Factory\BookmarkControllerTableGatewayFactory',
        ),
    ),
    'view_manager' => array(
        'template_map'              => array(
            'bookmark/account/partial/form-update' => __DIR__ . '/../view/bookmark/account/partial/form-update.phtml',
            'bookmark/account/partial/form-create' => __DIR__ . '/../view/bookmark/account/partial/form-create.phtml',
        ),
        'template_path_stack'       => array(
            __DIR__ . '/../view',
        ),
    ),
);
