<?php
namespace User\Provider\Factory;


use User\Provider\RoleProvider;

class RoleProviderFactory
{
    public function __invoke($serviceLocator)
    {
        $authenticationService = $serviceLocator->get('User\Service\Authentication');

        return new RoleProvider($authenticationService);
    }
}