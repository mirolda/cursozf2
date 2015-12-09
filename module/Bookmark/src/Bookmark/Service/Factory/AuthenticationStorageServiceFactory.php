<?php

namespace Bookmark\Service\Factory;


use Bookmark\Service\AuthenticationStorageService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationStorageServiceFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $appName = $config['application']['name'];

        return new AuthenticationStorageService($appName);
    }
}