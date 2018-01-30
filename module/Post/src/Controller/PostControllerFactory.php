<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 05.01.2018
 * Time: 15:41
 */

namespace Post\Controller;

use    Post\Controller\PostController;
use    Zend\ServiceManager\Factory\FactoryInterface;
use    Interop\Container\ContainerInterface;
use    Post\Model\PostTable;

class PostControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null){
        $model = $container->get(PostTable::class);
        return new PostController($model);
    }
}