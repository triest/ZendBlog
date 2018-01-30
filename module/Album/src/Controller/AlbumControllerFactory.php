<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 05.01.2018
 * Time: 15:41
 */

namespace Album\Controller;

use    Album\Controller\PostController;
use    Zend\ServiceManager\Factory\FactoryInterface;
use    Interop\Container\ContainerInterface;
use    Album\Model\AlbumTable;

class AlbumControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null){
        $model = $container->get(AlbumTable::class);
        return new AlbumController($model);
    }
}