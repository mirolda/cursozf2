<?php
namespace Bookmark\Model\Factory;


use Bookmark\Model\BookmarkDao;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookmarkDaoFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return BookmarkDao
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $database = $serviceLocator->get('database');

        return new BookmarkDao($database);
    }
}