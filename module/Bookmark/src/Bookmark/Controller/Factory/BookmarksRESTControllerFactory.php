<?php

namespace Bookmark\Controller\Factory;


use Bookmark\Controller\BookmarksRESTController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookmarksRESTControllerFactory implements FactoryInterface
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
        $model = $sm->get('Bookmark\Model\BookmarksModel');
        $form = $sm->get('Bookmark\Form\Bookmark');

        return new BookmarksRESTController($model, $form);
    }
}