<?php
namespace Bookmark\Controller\Factory;


use Bookmark\Controller\AccountController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AccountControllerFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return AccountController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $bookmarkDao = $sm->get('Bookmark\Model\BookmarkDao');

        return new AccountController($bookmarkDao);
    }
}