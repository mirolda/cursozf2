<?php
namespace Bookmark\Model\Factory;

use Bookmark\Model\Bookmark;
use Bookmark\Model\BookmarkDaoTableGateway;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookmarkDaoTableGatewayFactory implements FactoryInterface
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
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new Bookmark());
        $adapter = $serviceLocator->get('database');
        $table = 'bookmarks';
        $tablegateway = new TableGateway($table, $adapter, null, $resultSetPrototype);

        return new BookmarkDaoTableGateway($tablegateway);
    }
}