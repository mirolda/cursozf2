<?php
namespace Bookmark\Model;

use Bookmark\Model\Interfaces\BookmarkDaoInterface;
use Zend\Db\Adapter\Adapter;

/**
 * Class BookmarkDao
 *
 * Data Access Object for Bookmark
 *
 */
class BookmarkDao implements BookmarkDaoInterface
{
    /**
     * @var Adapter
     */
    private $db;

    /**
     * @param Adapter $db
     */
    function __construct(Adapter $db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $resultSet = $this->db->query('SELECT * FROM bookmarks', Adapter::QUERY_MODE_EXECUTE);
        $bookmarks = new \ArrayObject();
        $count = $resultSet->count();

        for ($i = 0; $i < $count; $i++) {
            $row = $resultSet->current();
            $bookmark = new Bookmark($row->id, $row->url, $row->title, $row->description, $row->creationAt,
                $row->modifiedAt);
            $bookmarks->append($bookmark);
            $resultSet->next();
        }

        return $bookmarks;
    }

    /**
     * getById
     *
     * current() is not using FETCH_OBJ, it is using FETCH_ASSOC !!!
     *
     * @param $id
     *
     * @return Bookmark
     */
    public function getById($id)
    {
        $stmt = $this->db->createStatement('SELECT * FROM bookmarks WHERE id = ?');
        $resultSet = $stmt->execute([$id]);
        $row = $resultSet->current();

        return new Bookmark($row['id'], $row['url'], $row['title'], $row['description'], $row['creationAt'],
            $row['modifiedAt']);
    }

    private function validateExistUrl($url){
        $stmt= $this->db->createStatement('SELECT url FROM bookmarks WHERE url = ?');
        $resultSet=$stmt->execute([$url]);
        $count = $resultSet->count();
        if ($count>0)
            return false;
        else
            return true;
    }

    public function save($data)
    {
        if ($this->validateExistUrl($data['url'])) {
            $stmt = $this->db->createStatement('INSERT INTO bookmarks VALUES (NULL, ?, ?, ?, NULL, NULL)');
            $stmt->execute([$data['url'], $data['title'], $data['description']]);
        }
    }

    public function delete($id)
    {
        $stmt = $this->db->createStatement('DELETE FROM bookmarks WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function update($data)
    {
        $stmt = $this->db->createStatement('UPDATE bookmarks SET url = ?, title = ?, description = ?
             WHERE id = ?');
        $stmt->execute([$data['url'], $data['title'], $data['description'],  $data['id']]);
    }


}