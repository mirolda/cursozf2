<?php
namespace Bookmark\Model;


use Bookmark\Model\Interfaces\BookmarkDaoInterface;
use Zend\Db\TableGateway\TableGateway;

class BookmarkDaoTableGateway implements BookmarkDaoInterface
{
    /**
     * @var TableGateway
     */
    private $tablegateway;

    /**
     * @param TableGateway $tablegateway
     */
    function __construct(TableGateway $tablegateway)
    {
        $this->tablegateway = $tablegateway;
    }


    public function findAll()
    {
        return $this->tablegateway->select();
    }

    public function getById($id)
    {
        $resultset = $this->tablegateway->select(['id' => $id]);

        return $resultset->current();
    }

    public function save($data)
    {
        $this->tablegateway->insert($data);
    }

    public function delete($id)
    {
        $this->tablegateway->delete(['id' => $id]);
    }

    public function update($data)
    {
        $this->tablegateway->update($data, ['id' => $data['id']]);
    }
}