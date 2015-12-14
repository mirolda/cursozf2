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
     * @return BookmarkControlleººr
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $model = $sm->get('Bookmark\Model\BookmarksModel');
        $form = $sm->get('Bookmark\Form\Bookmark');

        return new UsersController($model, $form);
    }
}