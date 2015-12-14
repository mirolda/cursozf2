<?php

namespace Bookmark\Service\Factory;


use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationServiceFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('database');

        $authAdapter = new CredentialTreatmentAdapter($adapter);
        $authAdapter
            ->setTableName('User')
            ->setIdentityColumn('email')
            ->setCredentialColumn('password')
        ;

        $storage = $serviceLocator->get('Bookmark\Service\AuthenticationStorage');

        return new AuthenticationService($storage, $authAdapter);
    }
}