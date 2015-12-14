<?php
namespace Bookmark\Provider\Factory;


use Bookmark\Provider\RoleProvider;

class RoleProviderFactory
{
    public function __invoke($serviceLocator)
    {
        $authenticationService = $serviceLocator->get('User\Service\Authentication');

        return new RoleProvider($authenticationService);
    }
}