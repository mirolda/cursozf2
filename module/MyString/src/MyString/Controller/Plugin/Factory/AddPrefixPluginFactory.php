<?php
namespace MyString\Controller\Plugin\Factory;


use MyString\Controller\Plugin\AddPrefixPlugin;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AddPrefixPluginFactory implements FactoryInterface
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
        $config = $sm->get('config');
        $strPrefix = $config['MyString']['prefix'];

        return new AddPrefixPlugin($strPrefix);
    }
}