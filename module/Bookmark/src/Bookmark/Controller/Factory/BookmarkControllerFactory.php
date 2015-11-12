<?php
namespace Bookmark\Controller\Factory;

use Bookmark\Controller\BookmarkController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookmarkControllerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return BookmarkController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $bookmarkDao = $sm->get('Bookmark\Model\BookmarkDao');

        return new BookmarkController($bookmarkDao);
    }
}