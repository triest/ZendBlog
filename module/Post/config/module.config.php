<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 05.01.2018
 * Time: 12:55
 */
namespace Post;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\PostController::class => Controller\PostControllerFactory::class,
       //     Controller\AlbumController::class => InvokableFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Model\PostModel::class => Model\PostModelFactory::class,
        ],
    ],

    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'post' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/posts[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\PostController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'post' => __DIR__ . '/../view',
        ],
    ],
];