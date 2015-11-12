<?php
namespace Bookmark\Controller\Factory;

use Bookmark\Controller\BookmarkController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookmarkControllerTableGatewayFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $model = $sm->get('Bookmark\Model\BookmarkDaoTableGateway');

        return new BookmarkController($model);
    }
}